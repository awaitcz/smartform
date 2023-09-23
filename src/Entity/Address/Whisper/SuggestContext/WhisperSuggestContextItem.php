<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext;

final class WhisperSuggestContextItem
{

	public function __construct(
		private readonly SuggestContextAreaCodeType $codeType,
		private readonly string $code,
	)
	{
	}

	/**
	 * @return array<string, string>
	 */
	public function toArray(): array
	{
		return [
			'codeType' => $this->codeType->value,
			'code' => $this->code,
		];
	}

}
