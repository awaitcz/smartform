<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper\Query;

final class WhisperCompanyByNameQuery implements WhisperCompanyQuery
{

	public const FieldType = 'COMPANY_NAME';

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
			'COMPANY_NAME' => $this->query,
		];
	}

}
