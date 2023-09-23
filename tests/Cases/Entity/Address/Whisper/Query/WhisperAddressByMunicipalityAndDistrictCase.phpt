<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByMunicipalityAndDistrict;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByMunicipalityAndDistrictCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByMunicipalityAndDistrict('Test');
		Assert::same('MUNICIPALITY_AND_DISTRICT', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('MUNICIPALITY_AND_DISTRICT', $output);
		Assert::same('Test', $output['MUNICIPALITY_AND_DISTRICT']);
	}

}

$test = new WhisperAddressByMunicipalityAndDistrictCase();
$test->run();
