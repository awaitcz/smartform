<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidatedAddressResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class ValidatedAddressResponseCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Address/AddressValidate.json');

		$validatedAddressResponse = ValidatedAddressResponse::fromArray(Json::decode($jsonInput, Json::FORCE_ARRAY));

		Assert::same(ResultCode::Ok, $validatedAddressResponse->getResultCode());
		Assert::null($validatedAddressResponse->getErrorMessage());
		Assert::same(null, $validatedAddressResponse->getId());
		Assert::count(1, $validatedAddressResponse->getResult());
		Assert::same(ResultType::Hit, $validatedAddressResponse->getResultType());
		Assert::same(null, $validatedAddressResponse->getHint());

		$address = $validatedAddressResponse->getResult()[0];
		Assert::type(Address::class, $address);
	}

}

$test = new ValidatedAddressResponseCase();
$test->run();
