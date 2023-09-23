<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper;

use Awaitcz\SmartForm\Entity\AbstractResultResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use function array_map;

final class WhisperedAddressResponse extends AbstractResultResponse
{

	/**
	 * @param array<WhisperedAddress> $result
	 */
	public function __construct(
		ResultCode $resultCode,
		string|null $errorMessage,
		private readonly int|null $id,
		private readonly array $result,
	)
	{
		parent::__construct($resultCode, $errorMessage);
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			ResultCode::from($data['resultCode']),
			$data['errorMessage'],
			$data['id'] ? (int) $data['id'] : null,
			array_map(static fn (array $item) => WhisperedAddress::fromArray($item), $data['suggestions']),
		);
	}

	public function getId(): int|null
	{
		return $this->id;
	}

	/**
	 * @return array<WhisperedAddress>
	 */
	public function getResult(): array
	{
		return $this->result;
	}

}
