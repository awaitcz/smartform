<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

final class WhisperAddressByWholeAddress implements WhisperAddressQuery
{

	public const FIELD_TYPE = 'WHOLE_ADDRESS';

	public function __construct(private readonly string $wholeAddress)
	{
	}

	public function getWholeAddress(): string
	{
		return $this->wholeAddress;
	}

	public function getFieldType(): string
	{
		return self::FIELD_TYPE;
	}

	public function toArray(): array
	{
		return [
			'WHOLE_ADDRESS' => $this->wholeAddress,
		];
	}

}
