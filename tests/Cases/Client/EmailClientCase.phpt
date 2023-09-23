<?php declare(strict_types = 1);

namespace Tests\Cases\Client;

require __DIR__ . '/../../bootstrap.php';

use Awaitcz\SmartForm\Client\EmailClient;
use Awaitcz\SmartForm\Config;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmail;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmailResponse;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmail;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmailResult;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmailResultFlag;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Http\IHttpClient;
use GuzzleHttp\Psr7\Response;
use Mockery;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class EmailClientCase extends TestCase
{

	private function createClient(string $jsonInput): EmailClient
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../Fixtures/Email/' . $jsonInput);

		$http = Mockery::mock(IHttpClient::class);
		$http->shouldReceive('sendRequest')
			->andReturn(new Response(200, [], $jsonInput));

		$config = new Config('foo', 'bar', false);

		return new EmailClient($config, $http);
	}

	public function testValidate(): void
	{
		$client = $this->createClient('EmailValidate.json');

		$validatedEmailResult = $client->validate(
			new ValidateEmail('info@smartform.cz'),
		);

		Assert::type(ValidatedEmailResponse::class, $validatedEmailResult);
		Assert::same(ResultCode::Ok, $validatedEmailResult->getResultCode());
		Assert::same(null, $validatedEmailResult->getErrorMessage());
		Assert::type(ValidatedEmail::class, $validatedEmailResult->getResult());

		$validatedEmail = $validatedEmailResult->getResult();
		Assert::same(ValidateEmailResult::Exists, $validatedEmail->getResult());
		Assert::type('array', $validatedEmail->getResultFlags());
		Assert::count(1, $validatedEmail->getResultFlags());
		Assert::same('Foobar', $validatedEmail->getHint());
	}

	public function testValidateFail(): void
	{
		$client = $this->createClient('EmailValidateFail.json');

		$validatedEmailResult = $client->validate(
			new ValidateEmail('info@smartform.cz'),
		);

		Assert::type(ValidatedEmailResponse::class, $validatedEmailResult);
		Assert::same(ResultCode::Ok, $validatedEmailResult->getResultCode());
		Assert::same(null, $validatedEmailResult->getErrorMessage());
		Assert::type(ValidatedEmail::class, $validatedEmailResult->getResult());

		$validatedEmail = $validatedEmailResult->getResult();
		Assert::type(ValidateEmailResult::class, $validatedEmail->getResult());
		Assert::type('array', $validatedEmail->getResultFlags());
		Assert::count(1, $validatedEmail->getResultFlags());
		Assert::contains(ValidateEmailResultFlag::BadDomain, $validatedEmail->getResultFlags());
		Assert::same(null, $validatedEmail->getHint());
	}

}

$test = new EmailClientCase();
$test->run();
