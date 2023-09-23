<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

enum CoordinatesType: string
{

	case Exact = 'EXACT';

	case Center = 'CENTER';

	case Approximate = 'APPROXIMATE';

}
