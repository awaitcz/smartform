<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Email\Validate;

use function array_map;

final class ValidatedEmail
{

	/**
	 * @param array<ValidateEmailResultFlag> $resultFlags
	 */
	public function __construct(
		private readonly ValidateEmailResult $result,
		private readonly array $resultFlags = [],
		private readonly string|null $hint = null,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			ValidateEmailResult::from($data['result']),
			array_map(static fn (string $flag) => ValidateEmailResultFlag::from($flag), $data['resultFlags']),
			$data['hint'] ?? null,
		);
	}

	public function getResult(): ValidateEmailResult
	{
		return $this->result;
	}

	/** @return array<ValidateEmailResultFlag> */
	public function getResultFlags(): array
	{
		return $this->resultFlags;
	}

	public function getHint(): string|null
	{
		return $this->hint;
	}

}
