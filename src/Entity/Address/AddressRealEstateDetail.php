<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

final class AddressRealEstateDetail
{

	public function __construct(
		private readonly string|null $buildingParcelNumberFirst,
		private readonly string|null $buildingParcelNumberSecond,
		private readonly string|null $cadastralUnitName,
		private readonly string|null $cadastralUnitCode,
		private readonly bool|null $buildingWithLift,
		private readonly string|null $numberOfStoreys,
		private readonly string|null $numberOfFlats,
		private readonly string|null $floorArea,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['BUILDING_PARCEL_NUMBER_1'] ?? null,
			$data['BUILDING_PARCEL_NUMBER_2'] ?? null,
			$data['CADASTRAL_UNIT_NAME'] ?? null,
			$data['CADASTRAL_UNIT_CODE'] ?? null,
			$data['BUILDING_WITH_LIFT'] !== null ? $data['BUILDING_WITH_LIFT'] === 'true' : null,
			$data['NUMBER_OF_STOREYS'] ?? null,
			$data['NUMBER_OF_FLATS'] ?? null,
			$data['FLOOR_AREA'] ?? null,
		);
	}

	public function getBuildingParcelNumberFirst(): string|null
	{
		return $this->buildingParcelNumberFirst;
	}

	public function getBuildingParcelNumberSecond(): string|null
	{
		return $this->buildingParcelNumberSecond;
	}

	public function getCadastralUnitName(): string|null
	{
		return $this->cadastralUnitName;
	}

	public function getCadastralUnitCode(): string|null
	{
		return $this->cadastralUnitCode;
	}

	public function getBuildingWithLift(): bool|null
	{
		return $this->buildingWithLift;
	}

	public function getNumberOfStoreys(): string|null
	{
		return $this->numberOfStoreys;
	}

	public function getNumberOfFlats(): string|null
	{
		return $this->numberOfFlats;
	}

	public function getFloorArea(): string|null
	{
		return $this->floorArea;
	}

}
