<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

enum AddressType: string
{

	case Exact = 'EXACT';

	case Partial = 'PARTIAL';

}
