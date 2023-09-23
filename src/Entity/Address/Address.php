<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

final class Address
{

	public function __construct(
		private readonly AddressType $type,
		private readonly string|null $code,
		private readonly string|null $streetName,
		private readonly string|null $streetCode,
		private readonly string|null $municipalityName,
		private readonly string|null $municipalityCode,
		private readonly string|null $postName,
		private readonly string|null $postCode,
		private readonly string|null $municipalityAndOptionalDistrict,
		private readonly string|null $municipalityPartName,
		private readonly string|null $municipalityPartCode,
		private readonly string|null $cityAreaFirstName,
		private readonly string|null $cityAreaFirstCode,
		private readonly string|null $cityAreaSecondName,
		private readonly string|null $cityAreaSecondCode,
		private readonly string|null $cityAreaThirdName,
		private readonly string|null $cityAreaThirdCode,
		private readonly string|null $electoralAreaName,
		private readonly string|null $electoralAreaCode,
		private readonly string|null $districtName,
		private readonly string|null $districtCode,
		private readonly string|null $regionName,
		private readonly string|null $regionCode,
		private readonly string|null $countryName,
		private readonly string|null $countryCode,
		private readonly string|null $landRegistryHouseNumber,
		private readonly string|null $particularStreetHouseNumber,
		private readonly string|null $particularStreetHouseNumberCharacter,
		private readonly string|null $evidenceHouseNumber,
		private readonly string|null $numberWhole,
		private readonly string|null $firstLineAddress,
		private readonly string|null $firstLineAddressWithoutNumber,
		private readonly string|null $secondLineAddress,
		private readonly string|null $wholeName,
		private readonly AddressCoordinates $coordinates,
		private readonly AddressRealEstateDetail|null $realEstateDetail,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			AddressType::from($data['type']),
			$data['values']['CODE'] ?? null,
			$data['values']['STREET_NAME'] ?? null,
			$data['values']['STREET_CODE'] ?? null,
			$data['values']['MUNICIPALITY_NAME'] ?? null,
			$data['values']['MUNICIPALITY_CODE'] ?? null,
			$data['values']['POST_NAME'] ?? null,
			$data['values']['ZIP'] ?? null,
			$data['values']['MUNICIPALITY_AND_OPTIONAL_DISTRICT'] ?? null,
			$data['values']['MUNICIPALITY_PART_NAME'] ?? null,
			$data['values']['MUNICIPALITY_PART_CODE'] ?? null,
			$data['values']['CITY_AREA_1_NAME'] ?? null,
			$data['values']['CITY_AREA_1_CODE'] ?? null,
			$data['values']['CITY_AREA_2_NAME'] ?? null,
			$data['values']['CITY_AREA_2_CODE'] ?? null,
			$data['values']['CITY_AREA_3_NAME'] ?? null,
			$data['values']['CITY_AREA_3_CODE'] ?? null,
			$data['values']['ELECTORAL_AREA_NAME'] ?? null,
			$data['values']['ELECTORAL_AREA_CODE'] ?? null,
			$data['values']['DISTRICT_NAME'] ?? null,
			$data['values']['DISTRICT_CODE'] ?? null,
			$data['values']['REGION_NAME'] ?? null,
			$data['values']['REGION_CODE'] ?? null,
			$data['values']['COUNTRY_NAME'] ?? null,
			$data['values']['COUNTRY_CODE'] ?? null,
			$data['values']['NUMBER_POPISNE'] ?? null,
			$data['values']['NUMBER_ORIENT'] ?? null,
			$data['values']['CHAR_ORIENT'] ?? null,
			$data['values']['NUMBER_EVIDENCNI'] ?? null,
			$data['values']['NUMBER_WHOLE'] ?? null,
			$data['values']['FIRST_LINE'] ?? null,
			$data['values']['FIRST_LINE_NO_NUMBER'] ?? null,
			$data['values']['SECOND_LINE'] ?? null,
			$data['values']['WHOLE_NAME'] ?? null,
			AddressCoordinates::fromArray($data['coordinates']),
			isset($data['realEstateDetails'])
				? AddressRealEstateDetail::fromArray($data['realEstateDetails'])
				: null,
		);
	}

	public function getType(): AddressType
	{
		return $this->type;
	}

	public function getCode(): string|null
	{
		return $this->code;
	}

	public function getStreetName(): string|null
	{
		return $this->streetName;
	}

	public function getStreetCode(): string|null
	{
		return $this->streetCode;
	}

	public function getMunicipalityName(): string|null
	{
		return $this->municipalityName;
	}

	public function getMunicipalityCode(): string|null
	{
		return $this->municipalityCode;
	}

	public function getPostName(): string|null
	{
		return $this->postName;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getMunicipalityAndOptionalDistrict(): string|null
	{
		return $this->municipalityAndOptionalDistrict;
	}

	public function getMunicipalityPartName(): string|null
	{
		return $this->municipalityPartName;
	}

	public function getMunicipalityPartCode(): string|null
	{
		return $this->municipalityPartCode;
	}

	public function getCityAreaFirstName(): string|null
	{
		return $this->cityAreaFirstName;
	}

	public function getCityAreaFirstCode(): string|null
	{
		return $this->cityAreaFirstCode;
	}

	public function getCityAreaSecondName(): string|null
	{
		return $this->cityAreaSecondName;
	}

	public function getCityAreaSecondCode(): string|null
	{
		return $this->cityAreaSecondCode;
	}

	public function getCityAreaThirdName(): string|null
	{
		return $this->cityAreaThirdName;
	}

	public function getCityAreaThirdCode(): string|null
	{
		return $this->cityAreaThirdCode;
	}

	public function getElectoralAreaName(): string|null
	{
		return $this->electoralAreaName;
	}

	public function getElectoralAreaCode(): string|null
	{
		return $this->electoralAreaCode;
	}

	public function getDistrictName(): string|null
	{
		return $this->districtName;
	}

	public function getDistrictCode(): string|null
	{
		return $this->districtCode;
	}

	public function getRegionName(): string|null
	{
		return $this->regionName;
	}

	public function getRegionCode(): string|null
	{
		return $this->regionCode;
	}

	public function getCountryName(): string|null
	{
		return $this->countryName;
	}

	public function getCountryCode(): string|null
	{
		return $this->countryCode;
	}

	public function getLandRegistryHouseNumber(): string|null
	{
		return $this->landRegistryHouseNumber;
	}

	public function getParticularStreetHouseNumber(): string|null
	{
		return $this->particularStreetHouseNumber;
	}

	public function getParticularStreetHouseNumberCharacter(): string|null
	{
		return $this->particularStreetHouseNumberCharacter;
	}

	public function getEvidenceHouseNumber(): string|null
	{
		return $this->evidenceHouseNumber;
	}

	public function getNumberWhole(): string|null
	{
		return $this->numberWhole;
	}

	public function getFirstLineAddress(): string|null
	{
		return $this->firstLineAddress;
	}

	public function getFirstLineAddressWithoutNumber(): string|null
	{
		return $this->firstLineAddressWithoutNumber;
	}

	public function getSecondLineAddress(): string|null
	{
		return $this->secondLineAddress;
	}

	public function getWholeName(): string|null
	{
		return $this->wholeName;
	}

	public function getCoordinates(): AddressCoordinates
	{
		return $this->coordinates;
	}

	public function getRealEstateDetail(): AddressRealEstateDetail|null
	{
		return $this->realEstateDetail;
	}

}
