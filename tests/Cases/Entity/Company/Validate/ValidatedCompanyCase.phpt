<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Company\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\Company\CompanyStatus;
use Awaitcz\SmartForm\Entity\Company\Validate\ValidatedCompany;
use Nette\Utils\Json;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class ValidatedCompanyCase extends TestCase
{

	public function testUsing(): void
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../../../Fixtures/Company/CompanyValidate.json');

		$decodedInput = Json::decode($jsonInput, Json::FORCE_ARRAY);

		$validatedCompany = ValidatedCompany::fromArray($decodedInput['result'][0]);

		Assert::same('Státní tiskárna cenin, s. p.', $validatedCompany->getName());
		Assert::same('00001279', $validatedCompany->getRegistrationNumber());
		Assert::same('CZ00001279', $validatedCompany->getVatNumber());
		Assert::same('1989-06-30', $validatedCompany->getDateOfEstablishment()?->format('Y-m-d'));
		Assert::same('2049-06-01', $validatedCompany->getDateOfDissolution()?->format('Y-m-d'));
		Assert::same('301', $validatedCompany->getLegalFormCode());
		Assert::same('Státní podnik', $validatedCompany->getLegalForm());
		Assert::same(CompanyStatus::Active, $validatedCompany->getStatus());
		Assert::type(Address::class, $validatedCompany->getOfficialAddress());
		Assert::same('250 - 499 zaměstnanců', $validatedCompany->getNumberOfEmployees());
		Assert::count(18, $validatedCompany->getNaceCodes());
		Assert::contains('18130', $validatedCompany->getNaceCodes());
		Assert::contains('COMPANY_REGISTRATION_NUMBER', $validatedCompany->getMatchedInputFields());
	}

}

$test = new ValidatedCompanyCase();
$test->run();
