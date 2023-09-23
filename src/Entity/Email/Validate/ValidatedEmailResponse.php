<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Email\Validate;

use Awaitcz\SmartForm\Entity\AbstractResultResponse;
use Awaitcz\SmartForm\Entity\ResultCode;

final class ValidatedEmailResponse extends AbstractResultResponse
{

	public function __construct(
		ResultCode $resultCode,
		string|null $errorMessage,
		private readonly ValidatedEmail $result,
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
			ValidatedEmail::fromArray($data),
		);
	}

	public function getResult(): ValidatedEmail
	{
		return $this->result;
	}

}
