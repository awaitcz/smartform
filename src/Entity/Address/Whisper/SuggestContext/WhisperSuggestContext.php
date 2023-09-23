<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext;

use function array_map;

final class WhisperSuggestContext
{

	/**
	 * @param array<WhisperSuggestContextItem> $items
	 */
	public function __construct(
		private readonly SuggestContextType $suggestContextType,
		private readonly array $items = [],
	)
	{
	}

	public function getSuggestContextType(): SuggestContextType
	{
		return $this->suggestContextType;
	}

	/**
	 * @return array<WhisperSuggestContextItem>
	 */
	public function getItems(): array
	{
		return $this->items;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array
	{
		return [
			'items' => array_map(static fn (WhisperSuggestContextItem $item): array => $item->toArray(), $this->items),
			'type' => $this->suggestContextType->value,
		];
	}

}
