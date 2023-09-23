<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Validate\ValidateCompany;
use Tester\Assert;
use Tester\TestCase;

final class ValidateCompanyCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new ValidateCompany('Foo', 'Bar', 'FooBar');

		$output
			= $instance->toArray();
		Assert::same('Foo', $output['values']['COMPANY_NAME']);
		Assert::same('Bar', $output['values']['COMPANY_REGISTRATION_NUMBER']);
		Assert::same('FooBar', $output['values']['COMPANY_VAT_NUMBER']);
	}

}

$test = new ValidateCompanyCase();
$test->run();
