<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

final class AddressCoordinates
{

	public function __construct(
		private readonly CoordinatesType $type,
		private readonly float|null $jtskX,
		private readonly float|null $jtskY,
		private readonly float|null $gpsLat,
		private readonly float|null $gpsLng,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			CoordinatesType::from($data['type']),
			$data['jtskX'] ?? null,
			$data['jtskY'] ?? null,
			$data['gpsLat'] ?? null,
			$data['gpsLng'] ?? null,
		);
	}

	public function getType(): CoordinatesType
	{
		return $this->type;
	}

	public function getJtskX(): float|null
	{
		return $this->jtskX;
	}

	public function getJtskY(): float|null
	{
		return $this->jtskY;
	}

	public function getGpsLat(): float|null
	{
		return $this->gpsLat;
	}

	public function getGpsLng(): float|null
	{
		return $this->gpsLng;
	}

}
