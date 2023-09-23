<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper;

final class WhisperedAddress
{

	/**
	 * @param array<string> $flags
	 */
	public function __construct(
		private readonly string $fieldType,
		private readonly string|null $number,
		private readonly string|null $streetWithNumber,
		private readonly string|null $street,
		private readonly string|null $city,
		private readonly string|null $municipalityAndDistrict,
		private readonly string|null $municipality,
		private readonly string|null $district,
		private readonly string|null $region,
		private readonly string|null $postCode,
		private readonly string|null $wholeAddress,
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
			$data['values']['NUMBER'] ?? null,
			$data['values']['STREET_AND_NUMBER'] ?? null,
			$data['values']['STREET'] ?? null,
			$data['values']['CITY'] ?? null,
			$data['values']['MUNICIPALITY_AND_DISTRICT'] ?? null,
			$data['values']['MUNICIPALITY'] ?? null,
			$data['values']['DISTRICT'] ?? null,
			$data['values']['REGION'] ?? null,
			$data['values']['ZIP'] ?? null,
			$data['values']['WHOLE_ADDRESS'] ?? null,
			$data['flags'] ?? [],
		);
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function getNumber(): string|null
	{
		return $this->number;
	}

	public function getStreetWithNumber(): string|null
	{
		return $this->streetWithNumber;
	}

	public function getStreet(): string|null
	{
		return $this->street;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getMunicipalityAndDistrict(): string|null
	{
		return $this->municipalityAndDistrict;
	}

	public function getMunicipality(): string|null
	{
		return $this->municipality;
	}

	public function getDistrict(): string|null
	{
		return $this->district;
	}

	public function getRegion(): string|null
	{
		return $this->region;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getWholeAddress(): string|null
	{
		return $this->wholeAddress;
	}

	/**
	 * @return array<string>
	 */
	public function getFlags(): array
	{
		return $this->flags;
	}

}
