<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Enum;

final class LoanStatus
{

	public const APPLICATION = 'application'; // loan request sent
	public const CANCELLED = 'canceled'; // request cancelled by client
	public const REJECTED = 'rejection'; // request rejected
	public const APPROVED = 'approved';
	public const OVERDUE = 'overdue'; // late payment
	public const PAID = 'paid';
	public const NO_CHANGE = '';

	public const VALID_STATUSES = [
		self::APPLICATION,
		self::CANCELLED,
		self::REJECTED,
		self::APPROVED,
		self::OVERDUE,
		self::PAID,
		self::NO_CHANGE,
	];

}
