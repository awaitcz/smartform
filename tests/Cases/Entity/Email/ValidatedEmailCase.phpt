<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Email;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmail;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmailResult;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmailResultFlag;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class ValidatedEmailCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../Fixtures/Email/EmailValidate.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$validatedEmail = ValidatedEmail::fromArray($decodedInput);

		Assert::same(ValidateEmailResult::Exists, $validatedEmail->getResult());
		Assert::count(1, $validatedEmail->getResultFlags());
		Assert::same(ValidateEmailResultFlag::AcceptAllPolicy, $validatedEmail->getResultFlags()[0]);
		Assert::same('Foobar', $validatedEmail->getHint());
	}

}

$test = new ValidatedEmailCase();
$test->run();
