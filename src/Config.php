<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm;

final class Config
{

	public function __construct(public string $clientId, public string $token, public bool $testMode = false)
	{
	}

	public function getClientId(): string
	{
		return $this->clientId;
	}

	public function getToken(): string
	{
		return $this->token;
	}

	public function isTestMode(): bool
	{
		return $this->testMode;
	}

}
