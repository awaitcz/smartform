<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper;

use Awaitcz\SmartForm\Entity\Company\Whisper\Query\WhisperCompanyQuery;

final class WhisperCompany
{

	public function __construct(private readonly WhisperCompanyQuery $query, private readonly int $limit = 21)
	{
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array
	{
		return [
			'fieldType' => $this->query->getFieldType(),
			'limit' => $this->limit > 21 || $this->limit < 1 ? 21 : $this->limit,
			'values' => $this->query->toArray(),
		];
	}

}
