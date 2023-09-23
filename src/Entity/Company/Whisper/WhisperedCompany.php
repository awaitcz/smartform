<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper;

final class WhisperedCompany
{

	/**
	 * @param array<string> $flags
	 */
	public function __construct(
		private readonly string $fieldType,
		private readonly string|null $name,
		private readonly string|null $registrationNumber,
		private readonly string|null $vatNumber,
		private readonly string|null $addressNumber,
		private readonly string|null $streetAndNumber,
		private readonly string|null $street,
		private readonly string|null $city,
		private readonly string|null $postCode,
		private readonly string|null $wholeAddress,
		private readonly string|null $code,
		private readonly array $flags = [],
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['fieldType'],
			$data['values']['COMPANY_NAME'] ?? null,
			$data['values']['COMPANY_REGISTRATION_NUMBER'] ?? null,
			$data['values']['COMPANY_VAT_NUMBER'] ?? null,
			$data['values']['ADDRESS_NUMBER'] ?? null,
			$data['values']['ADDRESS_STREET_AND_NUMBER'] ?? null,
			$data['values']['ADDRESS_STREET'] ?? null,
			$data['values']['ADDRESS_CITY'] ?? null,
			$data['values']['ADDRESS_ZIP'] ?? null,
			$data['values']['ADDRESS_WHOLE_ADDRESS'] ?? null,
			$data['values']['ADDRESS_CODE'] ?? null,
			$data['flags'] ?? [],
		);
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
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

	public function getAddressNumber(): string|null
	{
		return $this->addressNumber;
	}

	public function getStreetAndNumber(): string|null
	{
		return $this->streetAndNumber;
	}

	public function getStreet(): string|null
	{
		return $this->street;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getWholeAddress(): string|null
	{
		return $this->wholeAddress;
	}

	public function getCode(): string|null
	{
		return $this->code;
	}

	/**
	 * @return array<string>
	 */
	public function getFlags(): array
	{
		return $this->flags;
	}

}
