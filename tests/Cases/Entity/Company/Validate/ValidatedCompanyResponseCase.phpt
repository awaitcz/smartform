<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Validate\ValidatedCompanyResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class ValidatedCompanyResponseCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Company/CompanyValidate.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$instance = ValidatedCompanyResponse::fromArray($decodedInput);

		Assert::same(ResultCode::Ok, $instance->getResultCode());
		Assert::same(null, $instance->getErrorMessage());
		Assert::same(ResultType::Hit, $instance->getResultType());
		Assert::count(1, $instance->getResult());
	}

}

$test = new ValidatedCompanyResponseCase();
$test->run();
