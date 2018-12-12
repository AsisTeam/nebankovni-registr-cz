<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Validator;

use Contributte\NRCZ\Enum\ErrorResult;
use Contributte\NRCZ\Exception\Runtime\ServiceNotAllowedException;
use Contributte\NRCZ\Exception\Runtime\ServiceNotPaidException;

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
