<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

interface WhisperAddressQuery
{

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array;

	public function getFieldType(): string;

}
