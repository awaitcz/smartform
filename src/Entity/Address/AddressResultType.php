<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

enum AddressResultType: string
{

	case Hit = 'HIT';

	case PartialHit = 'PARTIAL_HIT';

	case Nothing = 'NOTHING';

	case Many = 'MANY';

	case TooMany = 'TOO_MANY';

}
