<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Company;

enum CompanyStatus: string
{

	case Active = 'ACTIVE';

	case Liquidation = 'LIQUIDATION';

	case NotActive = 'NOT_ACTIVE';

}
