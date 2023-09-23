<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\AddressCoordinates;
use Awaitcz\SmartForm\Entity\Address\CoordinatesType;
use Tester\Assert;
use Tester\TestCase;

final class AddressCoordinatesCase extends TestCase
{

	public function testUsing(): void
	{
		$coordinates = AddressCoordinates::fromArray([
			'type' => 'EXACT',
			'jtskX' => 1042408.96,
			'jtskY' => 743390.84,
			'gpsLat' => 50.0921327,
			'gpsLng' => 14.4120572,
		]);

		Assert::type(AddressCoordinates::class, $coordinates);
		Assert::same(CoordinatesType::Exact, $coordinates->getType());
		Assert::same(1042408.96, $coordinates->getJtskX());
		Assert::same(743390.84, $coordinates->getJtskY());
		Assert::same(50.0921327, $coordinates->getGpsLat());
		Assert::same(14.4120572, $coordinates->getGpsLng());
	}

}

$test = new AddressCoordinatesCase();
$test->run();
