<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Email\Validate;

final class ValidateEmail
{

	public function __construct(private readonly string $emailAddress)
	{
	}

	/**
	 * @return array<string, string>
	 */
	public function toArray(): array
	{
		return [
			'emailAddress' => $this->emailAddress,
		];
	}

}
