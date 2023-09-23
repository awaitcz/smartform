<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company\Validate;

final class ValidateCompany
{

	public function __construct(
		private readonly string $name = '',
		private readonly string $registrationNumber = '',
		private readonly string $vatNumber = '',
	)
	{
	}

	/**
	 * @return array<string, array<string, string>>
	 */
	public function toArray(): array
	{
		return [
			'values' => [
				'COMPANY_NAME' => $this->name,
				'COMPANY_REGISTRATION_NUMBER' => $this->registrationNumber,
				'COMPANY_VAT_NUMBER' => $this->vatNumber,
			],
		];
	}

}
