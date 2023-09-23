<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Email;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmail;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmailResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class ValidatedEmailResponseCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../Fixtures/Email/EmailValidate.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$instance = ValidatedEmailResponse::fromArray($decodedInput);

		Assert::same(ResultCode::Ok, $instance->getResultCode());
		Assert::same(null, $instance->getErrorMessage());
		Assert::type(ValidatedEmail::class, $instance->getResult());
	}

}

$test = new ValidatedEmailResponseCase();
$test->run();
