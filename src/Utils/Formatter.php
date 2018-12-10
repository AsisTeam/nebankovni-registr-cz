<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Utils;

use Contributte\NRCZ\Enum\Boolean;

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
