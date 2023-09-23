<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperedCompany;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class WhisperedCompanyCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Company/CompanyWhisper.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$whisperedCompany = WhisperedCompany::fromArray($decodedInput['suggestions'][1]);

		Assert::type(WhisperedCompany::class, $whisperedCompany);
		Assert::same('COMPANY_NAME', $whisperedCompany->getFieldType());
		Assert::same('Státní tiskárna cenin, s. p.', $whisperedCompany->getName());
		Assert::same('00001279', $whisperedCompany->getRegistrationNumber());
		Assert::same('943/6', $whisperedCompany->getAddressNumber());
		Assert::same('Růžová 943/6', $whisperedCompany->getStreetAndNumber());
		Assert::same('Růžová', $whisperedCompany->getStreet());
		Assert::same('Praha', $whisperedCompany->getCity());
		Assert::same('11000', $whisperedCompany->getPostCode());
		Assert::same('Růžová 943/6, 11000 Praha 1 – Nové Město', $whisperedCompany->getWholeAddress());
		Assert::same('21707553', $whisperedCompany->getCode());
		Assert::count(0, $whisperedCompany->getFlags());
	}

}

$test = new WhisperedCompanyCase();
$test->run();
