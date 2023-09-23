<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper;

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressQuery;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContext;
use Awaitcz\SmartForm\Entity\Country;

final class WhisperAddress
{

	public function __construct(
		private readonly WhisperAddressQuery $values,
		private readonly int|null $id = null,
		private readonly int $limit = 21,
		private readonly Country|null $country = null,
		private readonly WhisperSuggestContext|null $suggestContext = null,
	)
	{
	}

	public function getValues(): WhisperAddressQuery
	{
		return $this->values;
	}

	public function getId(): int|null
	{
		return $this->id;
	}

	public function getLimit(): int
	{
		return $this->limit;
	}

	public function getCountry(): Country|null
	{
		return $this->country;
	}

	public function getSuggestContext(): WhisperSuggestContext|null
	{
		return $this->suggestContext;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id ?? 0,
			'fieldType' => $this->values->getFieldType(),
			'values' => $this->values->toArray(),
			'country' => $this->country?->value ?? Country::CzechRepublic,
			'limit' => $this->limit > 21 || $this->limit < 1 ? 21 : $this->limit,
		];
	}

}
