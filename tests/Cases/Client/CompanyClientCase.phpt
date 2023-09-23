<?php declare(strict_types = 1);

namespace Tests\Cases\Client;

require __DIR__ . '/../../bootstrap.php';

use Awaitcz\SmartForm\Client\CompanyClient;
use Awaitcz\SmartForm\Config;
use Awaitcz\SmartForm\Entity\Company\Validate\ValidateCompany;
use Awaitcz\SmartForm\Entity\Company\Validate\ValidatedCompanyResponse;
use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyByNameQuery;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperCompany;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperedCompanyResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use Awaitcz\SmartForm\Http\IHttpClient;
use GuzzleHttp\Psr7\Response;
use Mockery;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class CompanyClientCase extends TestCase
{

	private function createClient(string $jsonInput): CompanyClient
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../Fixtures/Company/' . $jsonInput);

		$http = Mockery::mock(IHttpClient::class);
		$http->shouldReceive('sendRequest')
			->andReturn(new Response(200, [], $jsonInput));

		$config = new Config('foo', 'bar', false);

		return new CompanyClient($config, $http);
	}

	public function testValidate(): void
	{
		$client = $this->createClient('CompanyValidate.json');

		$validatedCompanyResult = $client->validate(
			new ValidateCompany(
				registrationNumber: '00001279',
			),
		);

		Assert::type(ValidatedCompanyResponse::class, $validatedCompanyResult);
		Assert::same(ResultCode::Ok, $validatedCompanyResult->getResultCode());
		Assert::same(null, $validatedCompanyResult->getErrorMessage());
		Assert::count(1, $validatedCompanyResult->getResult());
		Assert::same(ResultType::Hit, $validatedCompanyResult->getResultType());
	}

	public function testWhisper(): void
	{
		$client = $this->createClient('CompanyWhisper.json');

		$whisperedCompanyResult = $client->whisper(
			new WhisperCompany(
				new WhisperCompanyByNameQuery('cenin'),
			),
		);

		Assert::type(WhisperedCompanyResponse::class, $whisperedCompanyResult);
		Assert::same(ResultCode::Ok, $whisperedCompanyResult->getResultCode());
		Assert::same(null, $whisperedCompanyResult->getErrorMessage());
		Assert::count(4, $whisperedCompanyResult->getResult());
	}

}

$test = new CompanyClientCase();
$test->run();
