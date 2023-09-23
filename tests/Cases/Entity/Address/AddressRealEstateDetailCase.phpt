<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\AddressRealEstateDetail;
use Tester\Assert;
use Tester\TestCase;

final class AddressRealEstateDetailCase extends TestCase
{

	public function testUsing(): void
	{
		$realEstateDetail = AddressRealEstateDetail::fromArray([
			'BUILDING_PARCEL_NUMBER_1' => '680',
			'BUILDING_PARCEL_NUMBER_2' => '4',
			'CADASTRAL_UNIT_NAME' => 'Malá Strana',
			'CADASTRAL_UNIT_CODE' => '727091',
			'BUILDING_WITH_LIFT' => 'true',
			'NUMBER_OF_STOREYS' => '1',
			'NUMBER_OF_FLATS' => '0',
			'FLOOR_AREA' => '7486',
		]);

		Assert::type(AddressRealEstateDetail::class, $realEstateDetail);
		Assert::same('680', $realEstateDetail->getBuildingParcelNumberFirst());
		Assert::same('4', $realEstateDetail->getBuildingParcelNumberSecond());
		Assert::same('Malá Strana', $realEstateDetail->getCadastralUnitName());
		Assert::same('727091', $realEstateDetail->getCadastralUnitCode());
		Assert::same(true, $realEstateDetail->getBuildingWithLift());
		Assert::same('1', $realEstateDetail->getNumberOfStoreys());
		Assert::same('0', $realEstateDetail->getNumberOfFlats());
		Assert::same('7486', $realEstateDetail->getFloorArea());
	}

}

$test = new AddressRealEstateDetailCase();
$test->run();
