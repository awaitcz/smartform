<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity;

abstract class AbstractResultResponse
{

	public function __construct(protected readonly ResultCode $resultCode, protected readonly string|null $errorMessage)
	{
	}

	public function getResultCode(): ResultCode
	{
		return $this->resultCode;
	}

	public function getErrorMessage(): string|null
	{
		return $this->errorMessage;
	}

}
