<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Validate;

use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\Company\CompanyStatus;
use DateTimeImmutable;

final class ValidatedCompany
{

	/**
	 * @param array<int, string> $naceCodes
	 * @param array<string> $matchedInputFields
	 */
	public function __construct(
		private readonly string|null $name,
		private readonly string|null $registrationNumber,
		private readonly string|null $vatNumber,
		private readonly DateTimeImmutable|null $dateOfEstablishment,
		private readonly DateTimeImmutable|null $dateOfDissolution,
		private readonly string|null $legalFormCode,
		private readonly string|null $legalForm,
		private readonly CompanyStatus $status,
		private readonly Address|null $officialAddress,
		private readonly string|null $numberOfEmployees,
		private readonly array $naceCodes = [],
		private readonly array $matchedInputFields = [],
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		$createDate = isset($data['company']['createDate'])
			? DateTimeImmutable::createFromFormat('Y-m-d', $data['company']['createDate'])
			: null;
		$dissolutionDate = isset($data['company']['dissolutionDate'])
			? DateTimeImmutable::createFromFormat('Y-m-d', $data['company']['dissolutionDate'])
			: null;

		return new self(
			$data['company']['name'] ?? null,
			$data['company']['registrationNumber'] ?? null,
			$data['company']['taxNumber'] ?? null,
			$createDate instanceof DateTimeImmutable ? $createDate : null,
			$dissolutionDate instanceof DateTimeImmutable ? $dissolutionDate : null,
			$data['company']['legalFormCode'] ?? null,
			$data['company']['legalForm'] ?? null,
			CompanyStatus::from($data['company']['status']),
			isset($data['company']['officialAddress']) ? Address::fromArray($data['company']['officialAddress']) : null,
			$data['company']['size'] ?? null,
			$data['company']['naceCodes'] ?? [],
			$data['matchedInputFields'],
		);
	}

	public function getName(): string|null
	{
		return $this->name;
	}

	public function getRegistrationNumber(): string|null
	{
		return $this->registrationNumber;
	}

	public function getVatNumber(): string|null
	{
		return $this->vatNumber;
	}

	public function getDateOfEstablishment(): DateTimeImmutable|null
	{
		return $this->dateOfEstablishment;
	}

	public function getDateOfDissolution(): DateTimeImmutable|null
	{
		return $this->dateOfDissolution;
	}

	public function getLegalFormCode(): string|null
	{
		return $this->legalFormCode;
	}

	public function getLegalForm(): string|null
	{
		return $this->legalForm;
	}

	public function getStatus(): CompanyStatus
	{
		return $this->status;
	}

	public function getOfficialAddress(): Address|null
	{
		return $this->officialAddress;
	}

	public function getNumberOfEmployees(): string|null
	{
		return $this->numberOfEmployees;
	}

	/**
	 * @return array<int, string>
	 */
	public function getNaceCodes(): array
	{
		return $this->naceCodes;
	}

	/**
	 * @return array<string>
	 */
	public function getMatchedInputFields(): array
	{
		return $this->matchedInputFields;
	}

}
