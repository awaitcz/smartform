<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper\Query;

final class WhisperCompanyByRegistrationNumberQuery implements WhisperCompanyQuery
{

	public const FieldType = 'COMPANY_REGISTRATION_NUMBER';

	public function __construct(private readonly string $query)
	{
	}

	public function getQuery(): string
	{
		return $this->query;
	}

	public function getFieldType(): string
	{
		return self::FieldType;
	}

	public function toArray(): array
	{
		return [
			'COMPANY_REGISTRATION_NUMBER' => $this->query,
		];
	}

}
