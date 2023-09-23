<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetAndNumberMunicipalityPostCode;
use Awaitcz\SmartForm\Exception\InvalidArgumentException;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByStreetAndNumberMunicipalityPostCodeCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByStreetAndNumberMunicipalityPostCode(
			'Foobar',
			'12345',
			'Foo',
			'Bar',
			WhisperAddressByStreetAndNumberMunicipalityPostCode::FieldPostCode,
		);
		Assert::same('Foobar', $instance->getStreetAndNumber());
		Assert::same('12345', $instance->getPostCode());
		Assert::same('Foo', $instance->getMunicipality());
		Assert::same('Bar', $instance->getCity());
		Assert::same('ZIP', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('STREET_AND_NUMBER', $output);
		Assert::same('Foobar', $output['STREET_AND_NUMBER']);
		Assert::hasKey('ZIP', $output);
		Assert::same('12345', $output['ZIP']);
		Assert::hasKey('CITY', $output);
		Assert::same('Bar', $output['CITY']);
		Assert::hasKey('MUNICIPALITY', $output);
		Assert::same('Foo', $output['MUNICIPALITY']);

		Assert::exception(static fn () => new WhisperAddressByStreetAndNumberMunicipalityPostCode(
			'Foobar',
			'12345',
			null,
			null,
			WhisperAddressByStreetAndNumberMunicipalityPostCode::FieldMunicipality,
		), InvalidArgumentException::class, 'Either city or municipality must be set.');
	}

}

$test = new WhisperAddressByStreetAndNumberMunicipalityPostCodeCase();
$test->run();
