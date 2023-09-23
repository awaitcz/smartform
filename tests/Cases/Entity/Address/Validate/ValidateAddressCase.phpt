<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Country;
use Tester\Assert;
use Tester\TestCase;

final class ValidateAddressCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new ValidateAddress(
			16,
			[Country::CzechRepublic],
			'FirstAddressLine',
			'SecondAddressLine',
			'MunicipalityAndDistrict',
			'PostCode',
			'Street',
			'StreetCode',
			'MunicipalityPartCode',
			'MunicipalityCode',
			'WholeAddress',
			'NumberWhole',
			'NumberFirst',
			'NumberSecond',
			'NumberThird',
			'LandRegistryHouseNumber',
			'ParticularStreetHouseNumber',
			'ParticularStreetHouseNumberCharacter',
			'EvidenceHouseNumber',
			'Code',
		);

		$output = $instance->toArray();
		Assert::same(16, $output['id']);
		Assert::contains('CZ', $output['countries']);
		Assert::same('FirstAddressLine', $output['values']['FIRST_LINE']);
		Assert::same('SecondAddressLine', $output['values']['SECOND_LINE']);
		Assert::same('MunicipalityAndDistrict', $output['values']['MUNICIPALITY_AND_DISTRICT']);
		Assert::same('PostCode', $output['values']['ZIP']);
		Assert::same('Street', $output['values']['STREET']);
		Assert::same('StreetCode', $output['values']['STREET_CODE']);
		Assert::same('MunicipalityPartCode', $output['values']['MUNICIPALITY_PART_CODE']);
		Assert::same('MunicipalityCode', $output['values']['MUNICIPALITY_CODE']);
		Assert::same('WholeAddress', $output['values']['WHOLE_ADDRESS']);
		Assert::same('NumberWhole', $output['values']['NUMBER_WHOLE']);
		Assert::same('NumberFirst', $output['values']['NUMBER_1']);
		Assert::same('NumberSecond', $output['values']['NUMBER_2']);
		Assert::same('NumberThird', $output['values']['NUMBER_3']);
		Assert::same('LandRegistryHouseNumber', $output['values']['NUMBER_POPIS']);
		Assert::same('ParticularStreetHouseNumber', $output['values']['NUMBER_ORIENT']);
		Assert::same('ParticularStreetHouseNumberCharacter', $output['values']['CHAR_ORIENT']);
		Assert::same('EvidenceHouseNumber', $output['values']['NUMBER_EVIDENT']);
		Assert::same('Code', $output['values']['CODE']);
	}

}

$test = new ValidateAddressCase();
$test->run();
