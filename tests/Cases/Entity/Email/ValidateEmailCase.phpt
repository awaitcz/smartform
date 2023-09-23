<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Email;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmail;
use Tester\Assert;
use Tester\TestCase;

final class ValidateEmailCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new ValidateEmail('hello@world.com');

		$output = $instance->toArray();
		Assert::same('hello@world.com', $output['emailAddress']);
	}

}

$test = new ValidateEmailCase();
$test->run();
