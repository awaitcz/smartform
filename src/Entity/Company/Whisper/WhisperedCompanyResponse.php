<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Whisper;

use Awaitcz\SmartForm\Entity\AbstractResultResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use function array_map;

final class WhisperedCompanyResponse extends AbstractResultResponse
{

	/**
	 * @param array<WhisperedCompany> $result
	 */
	public function __construct(
		ResultCode $resultCode,
		string|null $errorMessage,
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
			array_map(static fn (array $item) => WhisperedCompany::fromArray($item), $data['suggestions']),
		);
	}

	/**
	 * @return array<WhisperedCompany>
	 */
	public function getResult(): array
	{
		return $this->result;
	}

}
