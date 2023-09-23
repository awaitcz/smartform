<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

use Awaitcz\SmartForm\Exception\InvalidArgumentException;

final class WhisperAddressByStreetNumberMunicipalityPostCode implements WhisperAddressQuery
{

	public const FieldStreet = 'STREET';

	public const FieldNumber = 'NUMBER';

	public const FieldMunicipality = 'MUNICIPALITY';

	public const FieldCity = 'CITY';

	public const FieldPostCode = 'ZIP';

	public function __construct(
		private readonly string|null $street = null,
		private readonly string|null $number = null,
		private readonly string|null $municipality = null,
		private readonly string|null $city = null,
		private readonly string|null $postCode = null,
		private readonly string $fieldType = self::FieldStreet,
	)
	{
		if ($this->city === null && $this->municipality === null) {
			throw new InvalidArgumentException('Either city or municipality must be set.');
		}
	}

	public function getStreet(): string|null
	{
		return $this->street;
	}

	public function getNumber(): string|null
	{
		return $this->number;
	}

	public function getMunicipality(): string|null
	{
		return $this->municipality;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function toArray(): array
	{
		$arr = [
			'NUMBER' => $this->number,
			'STREET' => $this->street,
			'ZIP' => $this->postCode,
		];

		if ($this->city !== null) {
			$arr['CITY'] = $this->city;
		}

		if ($this->municipality !== null) {
			$arr['MUNICIPALITY'] = $this->municipality;
		}

		return $arr;
	}

}
