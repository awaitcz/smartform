<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetNumberMunicipalityPostCode;
use Awaitcz\SmartForm\Exception\InvalidArgumentException;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByStreetNumberMunicipalityPostCodeCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByStreetNumberMunicipalityPostCode(
			'Foobar',
			'987',
			'Foo',
			'Bar',
			'12345',
			WhisperAddressByStreetNumberMunicipalityPostCode::FieldMunicipality,
		);
		Assert::same('Foobar', $instance->getStreet());
		Assert::same('987', $instance->getNumber());
		Assert::same('Foo', $instance->getMunicipality());
		Assert::same('Bar', $instance->getCity());
		Assert::same('12345', $instance->getPostCode());
		Assert::same('MUNICIPALITY', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('NUMBER', $output);
		Assert::same('987', $output['NUMBER']);
		Assert::hasKey('STREET', $output);
		Assert::same('Foobar', $output['STREET']);
		Assert::hasKey('ZIP', $output);
		Assert::same('12345', $output['ZIP']);
		Assert::hasKey('CITY', $output);
		Assert::same('Bar', $output['CITY']);
		Assert::hasKey('MUNICIPALITY', $output);
		Assert::same('Foo', $output['MUNICIPALITY']);

		Assert::exception(static fn () => new WhisperAddressByStreetNumberMunicipalityPostCode(
			'Foobar',
			'987',
			null,
			null,
			'12345',
			WhisperAddressByStreetNumberMunicipalityPostCode::FieldCity,
		), InvalidArgumentException::class, 'Either city or municipality must be set.');
	}

}

$test = new WhisperAddressByStreetNumberMunicipalityPostCodeCase();
$test->run();
