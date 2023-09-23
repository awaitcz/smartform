<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByWholeAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\SuggestContextType;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContext;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddress;
use Awaitcz\SmartForm\Entity\Country;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressCase extends TestCase
{

	public function testUsing(): void
	{
		$suggestContext = new WhisperSuggestContext(SuggestContextType::Preference, []);

		$instance = new WhisperAddress(
			new WhisperAddressByWholeAddress('Test'),
			7,
			15,
			Country::Slovakia,
			$suggestContext,
		);

		$output = $instance->toArray();
		Assert::same(7, $output['id']);
		Assert::same('WHOLE_ADDRESS', $output['fieldType']);
		Assert::count(1, $output['values']);
		Assert::same('SK', $output['country']);
		Assert::same(15, $output['limit']);
		Assert::same('PREFERENCE', $instance->getSuggestContext()?->getSuggestContextType()->value);
	}

}

$test = new WhisperAddressCase();
$test->run();
