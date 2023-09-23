<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Validate;

use Awaitcz\SmartForm\Entity\AbstractResultResponse;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use function array_map;

final class ValidatedCompanyResponse extends AbstractResultResponse
{

	/**
	 * @param array<ValidatedCompany> $result
	 */
	public function __construct(
		ResultCode $resultCode,
		string|null $errorMessage,
		private readonly ResultType $resultType,
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
			ResultType::from($data['type']),
			array_map(static fn (array $item) => ValidatedCompany::fromArray($item), $data['result']),
		);
	}

	public function getResultType(): ResultType
	{
		return $this->resultType;
	}

	/**
	 * @return array<ValidatedCompany>
	 */
	public function getResult(): array
	{
		return $this->result;
	}

}
