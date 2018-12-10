<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Lustration;

final class ResultEnum
{

	public const A = 'A';
	public const B = 'B';
	public const C = 'C';
	public const D = 'D';
	public const NO_RECORD = 'Bez záznamu';

	public const VALID_RESULTS = [self::A, self::B, self::C, self::D, self::NO_RECORD];

}
