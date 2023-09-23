<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Validate;

use Awaitcz\SmartForm\Entity\Country;
use function array_map;

final class ValidateAddress
{

	/**
	 * @param array<Country> $countries
	 */
	public function __construct(
		private readonly int|null $id = null,
		private readonly array $countries = [],
		private readonly string|null $firstAddressLine = null,
		private readonly string|null $secondAddressLine = null,
		private readonly string|null $municipalityAndDistrict = null,
		private readonly string|null $postCode = null,
		private readonly string|null $street = null,
		private readonly string|null $streetCode = null,
		private readonly string|null $municipalityPartCode = null,
		private readonly string|null $municipalityCode = null,
		private readonly string|null $wholeAddress = null,
		private readonly string|null $numberWhole = null,
		private readonly string|null $numberFirst = null,
		private readonly string|null $numberSecond = null,
		private readonly string|null $numberThird = null,
		private readonly string|null $landRegistryHouseNumber = null,
		private readonly string|null $particularStreetHouseNumber = null,
		private readonly string|null $particularStreetHouseNumberCharacter = null,
		private readonly string|null $evidenceHouseNumber = null,
		private readonly string|null $code = null,
	)
	{
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array
	{
		$arr = [
			'id' => $this->id ?? 0,
			'countries' => array_map(static fn (Country $country) => $country->value, $this->countries),
			'values' => [],

		];

		if ($this->firstAddressLine !== null) {
			$arr['values']['FIRST_LINE'] = $this->firstAddressLine;
		}

		if ($this->secondAddressLine !== null) {
			$arr['values']['SECOND_LINE'] = $this->secondAddressLine;
		}

		if ($this->municipalityAndDistrict !== null) {
			$arr['values']['MUNICIPALITY_AND_DISTRICT'] = $this->municipalityAndDistrict;
		}

		if ($this->postCode !== null) {
			$arr['values']['ZIP'] = $this->postCode;
		}

		if ($this->street !== null) {
			$arr['values']['STREET'] = $this->street;
		}

		if ($this->streetCode !== null) {
			$arr['values']['STREET_CODE'] = $this->streetCode;
		}

		if ($this->municipalityPartCode !== null) {
			$arr['values']['MUNICIPALITY_PART_CODE'] = $this->municipalityPartCode;
		}

		if ($this->municipalityCode !== null) {
			$arr['values']['MUNICIPALITY_CODE'] = $this->municipalityCode;
		}

		if ($this->wholeAddress !== null) {
			$arr['values']['WHOLE_ADDRESS'] = $this->wholeAddress;
		}

		if ($this->numberWhole !== null) {
			$arr['values']['NUMBER_WHOLE'] = $this->numberWhole;
		}

		if ($this->numberFirst !== null) {
			$arr['values']['NUMBER_1'] = $this->numberFirst;
		}

		if ($this->numberSecond !== null) {
			$arr['values']['NUMBER_2'] = $this->numberSecond;
		}

		if ($this->numberThird !== null) {
			$arr['values']['NUMBER_3'] = $this->numberThird;
		}

		if ($this->landRegistryHouseNumber !== null) {
			$arr['values']['NUMBER_POPIS'] = $this->landRegistryHouseNumber;
		}

		if ($this->particularStreetHouseNumber !== null) {
			$arr['values']['NUMBER_ORIENT'] = $this->particularStreetHouseNumber;
		}

		if ($this->particularStreetHouseNumberCharacter !== null) {
			$arr['values']['CHAR_ORIENT'] = $this->particularStreetHouseNumberCharacter;
		}

		if ($this->evidenceHouseNumber !== null) {
			$arr['values']['NUMBER_EVIDENT'] = $this->evidenceHouseNumber;
		}

		if ($this->code !== null) {
			$arr['values']['CODE'] = $this->code;
		}

		return $arr;
	}

}
