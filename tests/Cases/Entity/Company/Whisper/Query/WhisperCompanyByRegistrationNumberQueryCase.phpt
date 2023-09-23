<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyByRegistrationNumberQuery;
use Tester\Assert;
use Tester\TestCase;

final class WhisperCompanyByRegistrationNumberQueryCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperCompanyByRegistrationNumberQuery('Test');
		$output = $instance->toArray();
		Assert::same('Test', $output['COMPANY_REGISTRATION_NUMBER']);
	}

}

$test = new WhisperCompanyByRegistrationNumberQueryCase();
$test->run();
