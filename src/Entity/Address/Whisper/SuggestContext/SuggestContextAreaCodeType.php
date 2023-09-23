<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext;

enum SuggestContextAreaCodeType: string
{

	case MunicipalityCode = 'MUNICIPALITY_CODE';

	case DistrictCode = 'DISTRICT_CODE';

	case RegionCode = 'REGION_CODE';

}
