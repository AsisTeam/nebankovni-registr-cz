<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Utils;

use AsisTeam\NRCZ\Enum\Boolean;

final class Formatter
{

	public static function boolToStr(?bool $val): string
	{
		if ($val !== null) {
			return $val ? Boolean::YES : Boolean::NO;
		}

		return '';
	}

}
