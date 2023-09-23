<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity;

enum ResultCode: string
{

	case Ok = 'OK';

	case Fail = 'FAIL';

	case Test = 'TEST';

}
