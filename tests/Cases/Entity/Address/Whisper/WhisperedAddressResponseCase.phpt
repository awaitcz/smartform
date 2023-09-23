<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperedAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperedAddressResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class WhisperedAddressResponseCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Address/AddressWhisper.json');

		$whisperedAddressResponse = WhisperedAddressResponse::fromArray(Json::decode($jsonInput, Json::FORCE_ARRAY));

		Assert::same(ResultCode::Ok, $whisperedAddressResponse->getResultCode());
		Assert::null($whisperedAddressResponse->getErrorMessage());
		Assert::same(24, $whisperedAddressResponse->getId());
		Assert::count(1, $whisperedAddressResponse->getResult());
		Assert::type(WhisperedAddress::class, $whisperedAddressResponse->getResult()[0]);
	}

}

$test = new WhisperedAddressResponseCase();
$test->run();
