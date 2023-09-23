<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\SuggestContextAreaCodeType;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContextItem;
use Tester\Assert;
use Tester\TestCase;

final class WhisperSuggestContextItemCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperSuggestContextItem(SuggestContextAreaCodeType::RegionCode, 'Test');
		$output = $instance->toArray();

		Assert::hasKey('codeType', $output);
		Assert::same('REGION_CODE', $output['codeType']);
		Assert::hasKey('code', $output);
		Assert::same('Test', $output['code']);
	}

}

$test = new WhisperSuggestContextItemCase();
$test->run();
