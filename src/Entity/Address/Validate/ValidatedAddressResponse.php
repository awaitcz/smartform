<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Validate;

use Awaitcz\SmartForm\Entity\AbstractResultResponse;
use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use function array_map;

final class ValidatedAddressResponse extends AbstractResultResponse
{

	/**
	 * @param array<Address> $result
	 */
	public function __construct(
		ResultCode $resultCode,
		string|null $errorMessage,
		private readonly int|null $id,
		private readonly array $result = [],
		private readonly ResultType|null $resultType = null,
		private readonly string|null $hint = null,
	)
	{
		parent::__construct($resultCode, $errorMessage);
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		$resultCode = ResultCode::from($data['resultCode']);

		return $resultCode !== ResultCode::Fail ? new self(
			$resultCode,
			$data['errorMessage'],
			$data['id'] ? (int) $data['id'] : null,
			array_map(
				static fn (array $item) => Address::fromArray($item),
				$data['result']['addresses'],
			),
			ResultType::from($data['result']['type']),
			$data['result']['hint'],
		) : new self(
			$resultCode,
			$data['errorMessage'],
			$data['id'] ? (int) $data['id'] : null,
			[],
		);
	}

	public function getId(): int|null
	{
		return $this->id;
	}

	public function getResultType(): ResultType|null
	{
		return $this->resultType;
	}

	/**
	 * @return array<Address>
	 */
	public function getResult(): array
	{
		return $this->result;
	}

	public function getHint(): string|null
	{
		return $this->hint;
	}

}
