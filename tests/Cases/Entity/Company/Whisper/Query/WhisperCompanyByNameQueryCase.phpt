<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyByNameQuery;
use Tester\Assert;
use Tester\TestCase;

final class WhisperCompanyByNameQueryCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperCompanyByNameQuery('Test');
		$output = $instance->toArray();
		Assert::same('Test', $output['COMPANY_NAME']);
	}

}

$test = new WhisperCompanyByNameQueryCase();
$test->run();
