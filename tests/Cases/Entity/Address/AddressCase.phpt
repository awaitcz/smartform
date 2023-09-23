<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\Address\AddressCoordinates;
use Awaitcz\SmartForm\Entity\Address\AddressRealEstateDetail;
use Awaitcz\SmartForm\Entity\Address\AddressType;
use Tester\Assert;
use Tester\TestCase;

final class AddressCase extends TestCase
{

	public function testUsing(): void
	{
		$address = Address::fromArray([
			'type' => 'PARTIAL',
			'values' => [
				'CODE' => '25536869',
				'STREET_NAME' => 'nábřeží Edvarda Beneše',
				'STREET_CODE' => '507393',
				'MUNICIPALITY_NAME' => 'Praha',
				'MUNICIPALITY_CODE' => '554782',
				'POST_NAME' => 'Praha 011',
				'ZIP' => '11800',
				'MUNICIPALITY_AND_OPTIONAL_DISTRICT' => 'Praha',
				'MUNICIPALITY_PART_NAME' => 'Malá Strana',
				'MUNICIPALITY_PART_CODE' => '490121',
				'CITY_AREA_1_NAME' => 'Praha 1',
				'CITY_AREA_1_CODE' => '500054',
				'CITY_AREA_2_NAME' => 'Praha 1',
				'CITY_AREA_2_CODE' => '19',
				'CITY_AREA_3_NAME' => 'Praha 1',
				'CITY_AREA_3_CODE' => '19',
				'ELECTORAL_AREA_NAME' => '2',
				'ELECTORAL_AREA_CODE' => '30533',
				'DISTRICT_NAME' => 'území Hlavního města Prahy',
				'DISTRICT_CODE' => '9999',
				'REGION_NAME' => 'Hlavní město Praha',
				'REGION_CODE' => '19',
				'COUNTRY_NAME' => 'Česká republika',
				'COUNTRY_CODE' => 'CZ',
				'NUMBER_POPISNE' => '128',
				'NUMBER_ORIENT' => '6',
				'CHAR_ORIENT' => 'X',
				'NUMBER_EVIDENCNI' => '123',
				'NUMBER_WHOLE' => '128/6',
				'FIRST_LINE' => 'nábřeží Edvarda Beneše 128/6',
				'FIRST_LINE_NO_NUMBER' => 'nábřeží Edvarda Beneše',
				'SECOND_LINE' => 'Praha 1 - Malá Strana',
				'WHOLE_NAME' => 'nábřeží Edvarda Beneše 128/6, 118 00 Praha 1 - Malá Strana',
			],
			'coordinates' => [
				'type' => 'EXACT',
				'jtskX' => 1042408.96,
				'jtskY' => 743390.84,
				'gpsLat' => 50.0921327,
				'gpsLng' => 14.4120572,
			],
			'realEstateDetails' => [
				'BUILDING_PARCEL_NUMBER_1' => '680',
				'BUILDING_PARCEL_NUMBER_2' => '4',
				'CADASTRAL_UNIT_NAME' => 'Malá Strana',
				'CADASTRAL_UNIT_CODE' => '727091',
				'BUILDING_WITH_LIFT' => 'true',
				'NUMBER_OF_STOREYS' => '1',
				'NUMBER_OF_FLATS' => '0',
				'FLOOR_AREA' => '7486',
			],
		]);

		Assert::type(Address::class, $address);
		Assert::same(AddressType::Partial, $address->getType());
		Assert::same('25536869', $address->getCode());
		Assert::same('nábřeží Edvarda Beneše', $address->getStreetName());
		Assert::same('507393', $address->getStreetCode());
		Assert::same('Praha', $address->getMunicipalityName());
		Assert::same('554782', $address->getMunicipalityCode());
		Assert::same('Praha 011', $address->getPostName());
		Assert::same('11800', $address->getPostCode());
		Assert::same('Praha', $address->getMunicipalityAndOptionalDistrict());
		Assert::same('Malá Strana', $address->getMunicipalityPartName());
		Assert::same('490121', $address->getMunicipalityPartCode());
		Assert::same('Praha 1', $address->getCityAreaFirstName());
		Assert::same('500054', $address->getCityAreaFirstCode());
		Assert::same('Praha 1', $address->getCityAreaSecondName());
		Assert::same('19', $address->getCityAreaSecondCode());
		Assert::same('Praha 1', $address->getCityAreaThirdName());
		Assert::same('19', $address->getCityAreaThirdCode());
		Assert::same('2', $address->getElectoralAreaName());
		Assert::same('30533', $address->getElectoralAreaCode());
		Assert::same('území Hlavního města Prahy', $address->getDistrictName());
		Assert::same('9999', $address->getDistrictCode());
		Assert::same('Hlavní město Praha', $address->getRegionName());
		Assert::same('19', $address->getRegionCode());
		Assert::same('Česká republika', $address->getCountryName());
		Assert::same('CZ', $address->getCountryCode());
		Assert::same('128', $address->getLandRegistryHouseNumber());
		Assert::same('6', $address->getParticularStreetHouseNumber());
		Assert::same('X', $address->getParticularStreetHouseNumberCharacter());
		Assert::same('123', $address->getEvidenceHouseNumber());
		Assert::same('128/6', $address->getNumberWhole());
		Assert::same('nábřeží Edvarda Beneše 128/6', $address->getFirstLineAddress());
		Assert::same('nábřeží Edvarda Beneše', $address->getFirstLineAddressWithoutNumber());
		Assert::same('Praha 1 - Malá Strana', $address->getSecondLineAddress());
		Assert::same('nábřeží Edvarda Beneše 128/6, 118 00 Praha 1 - Malá Strana', $address->getWholeName());

		$coordinates = $address->getCoordinates();
		Assert::type(AddressCoordinates::class, $coordinates);

		$realEstateDetail = $address->getRealEstateDetail();
		Assert::type(AddressRealEstateDetail::class, $realEstateDetail);
	}

}

$test = new AddressCase();
$test->run();
