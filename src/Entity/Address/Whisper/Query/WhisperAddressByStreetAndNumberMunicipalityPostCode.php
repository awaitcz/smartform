<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

use Awaitcz\SmartForm\Exception\InvalidArgumentException;

final class WhisperAddressByStreetAndNumberMunicipalityPostCode implements WhisperAddressQuery
{

	public const FieldStreetAndNumber = 'STREET_AND_NUMBER';

	public const FieldMunicipality = 'MUNICIPALITY';

	public const FieldCity = 'CITY';

	public const FieldPostCode = 'ZIP';

	public function __construct(
		private readonly string|null $streetAndNumber = null,
		private readonly string|null $postCode = null,
		private readonly string|null $municipality = null,
		private readonly string|null $city = null,
		private readonly string $fieldType = self::FieldStreetAndNumber,
	)
	{
		if ($this->city === null && $this->municipality === null) {
			throw new InvalidArgumentException('Either city or municipality must be set.');
		}
	}

	public function getStreetAndNumber(): string|null
	{
		return $this->streetAndNumber;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getMunicipality(): string|null
	{
		return $this->municipality;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function toArray(): array
	{
		$arr = [
			'STREET_AND_NUMBER' => $this->streetAndNumber,
			'ZIP' => $this->postCode,
		];

		if ($this->municipality !== null) {
			$arr['MUNICIPALITY'] = $this->municipality;
		}

		if ($this->city !== null) {
			$arr['CITY'] = $this->city;
		}

		return $arr;
	}

}
