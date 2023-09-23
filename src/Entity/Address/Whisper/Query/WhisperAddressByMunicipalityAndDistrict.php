<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

final class WhisperAddressByMunicipalityAndDistrict implements WhisperAddressQuery
{

	public const FieldType = 'MUNICIPALITY_AND_DISTRICT';

	public function __construct(private readonly string $municipalityAndDistrict)
	{
	}

	public function getMunicipalityAndDistrict(): string
	{
		return $this->municipalityAndDistrict;
	}

	public function getFieldType(): string
	{
		return self::FieldType;
	}

	public function toArray(): array
	{
		return [
			'MUNICIPALITY_AND_DISTRICT' => $this->municipalityAndDistrict,
		];
	}

}
