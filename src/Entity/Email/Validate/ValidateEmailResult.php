<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Email\Validate;

enum ValidateEmailResult: string
{

	case Exists = 'EXISTS';

	case NotExists = 'NOT_EXISTS';

	case Unknown = 'UNKNOWN';

}
