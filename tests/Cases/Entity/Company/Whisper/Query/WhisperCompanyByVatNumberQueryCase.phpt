<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyByVatNumberQuery;
use Tester\Assert;
use Tester\TestCase;

final class WhisperCompanyByVatNumberQueryCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperCompanyByVatNumberQuery('Test');
		$output = $instance->toArray();
		Assert::same('Test', $output['COMPANY_VAT_NUMBER']);
	}

}

$test = new WhisperCompanyByVatNumberQueryCase();
$test->run();
