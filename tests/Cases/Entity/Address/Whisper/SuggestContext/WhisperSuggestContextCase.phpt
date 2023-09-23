<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\SuggestContextAreaCodeType;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\SuggestContextType;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContext;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContextItem;
use Tester\Assert;
use Tester\TestCase;

final class WhisperSuggestContextCase extends TestCase
{

	public function testUsing(): void
	{
		$suggestContextItem = new WhisperSuggestContextItem(
			SuggestContextAreaCodeType::RegionCode,
			'Test',
		);
		$instance = new WhisperSuggestContext(SuggestContextType::Preference, [$suggestContextItem]);
		$output = $instance->toArray();

		Assert::hasKey('items', $output);
		Assert::count(1, $output['items']);
		Assert::hasKey('type', $output);
		Assert::same('PREFERENCE', $output['type']);
	}

}

$test = new WhisperSuggestContextCase();
$test->run();
