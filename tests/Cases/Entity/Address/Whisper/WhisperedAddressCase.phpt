<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperedAddress;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class WhisperedAddressCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Address/AddressWhisper.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$whisperedAddress = WhisperedAddress::fromArray($decodedInput['suggestions'][0]);

		Assert::same('STREET_AND_NUMBER', $whisperedAddress->getFieldType());
		Assert::same('1266/3', $whisperedAddress->getNumber());
		Assert::same('Foglarova 1266/3', $whisperedAddress->getStreetWithNumber());
		Assert::same('Foglarova', $whisperedAddress->getStreet());
		Assert::same('Plzeň 23', $whisperedAddress->getCity());
		Assert::same('Foo', $whisperedAddress->getMunicipalityAndDistrict());
		Assert::same('Plzeň', $whisperedAddress->getMunicipality());
		Assert::same('Plzeň-město', $whisperedAddress->getDistrict());
		Assert::same('Plzeňský kraj', $whisperedAddress->getRegion());
		Assert::same('32300', $whisperedAddress->getPostCode());
		Assert::same('Foglarova 1266/3, 32300 Plzeň 23', $whisperedAddress->getWholeAddress());
		Assert::hasKey('WHOLE_ADDRESS', $whisperedAddress->getFlags());
		Assert::same('true', $whisperedAddress->getFlags()['WHOLE_ADDRESS']);
	}

}

$test = new WhisperedAddressCase();
$test->run();
