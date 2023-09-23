<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper\Query;

final class WhisperCompanyByVatNumberQuery implements WhisperCompanyQuery
{

	public const FieldType = 'COMPANY_VAT_NUMBER';

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
			'COMPANY_VAT_NUMBER' => $this->query,
		];
	}

}
