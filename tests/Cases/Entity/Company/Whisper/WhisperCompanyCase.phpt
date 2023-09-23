<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyByNameQuery;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperCompany;
use Tester\Assert;
use Tester\TestCase;

final class WhisperCompanyCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperCompany(
			new WhisperCompanyByNameQuery('Test'),
			7,
		);

		$output = $instance->toArray();
		Assert::same(7, $output['limit']);
		Assert::same('COMPANY_NAME', $output['fieldType']);
		Assert::count(1, $output['values']);
	}

}

$test = new WhisperCompanyCase();
$test->run();
