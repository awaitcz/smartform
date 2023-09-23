<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperedCompany;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperedCompanyResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class WhisperedCompanyResponseCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Company/CompanyWhisper.json');

		$whisperedCompanyResponse = WhisperedCompanyResponse::fromArray(Json::decode($jsonInput, Json::FORCE_ARRAY));

		Assert::same(ResultCode::Ok, $whisperedCompanyResponse->getResultCode());
		Assert::null($whisperedCompanyResponse->getErrorMessage());
		Assert::count(4, $whisperedCompanyResponse->getResult());
		Assert::type(WhisperedCompany::class, $whisperedCompanyResponse->getResult()[0]);
	}

}

$test = new WhisperedCompanyResponseCase();
$test->run();
