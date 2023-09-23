<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByWholeAddress;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByWholeAddressCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByWholeAddress('Test');
		$output = $instance->toArray();
		Assert::hasKey('WHOLE_ADDRESS', $output);
		Assert::same('Test', $output['WHOLE_ADDRESS']);
	}

}

$test = new WhisperAddressByWholeAddressCase();
$test->run();
