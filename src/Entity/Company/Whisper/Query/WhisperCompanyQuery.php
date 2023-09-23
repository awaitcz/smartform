<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper\Query;

interface WhisperCompanyQuery
{

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array;

	public function getFieldType(): string;

}
