<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext;

enum SuggestContextType: string
{

	case Filter = 'FILTER';

	case Preference = 'PREFERENCE';

}
