<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Validator;

use AsisTeam\NRCZ\Enum\ErrorResult;
use AsisTeam\NRCZ\Exception\Runtime\ServiceNotAllowedException;
use AsisTeam\NRCZ\Exception\Runtime\ServiceNotPaidException;

final class ResultValidator
{

	public static function validate(string $result): void
	{
		if ($result === ErrorResult::NOT_ALLOWED) {
			throw new ServiceNotAllowedException(ErrorResult::NOT_ALLOWED);
		}

		if ($result === ErrorResult::NOT_PAID) {
			throw new ServiceNotPaidException(ErrorResult::NOT_PAID);
		}
	}

}
