<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Enum;

final class MaritalStatus
{

	public const MARRIED = 'ženatý';
	public const SINGLE = 'svobodný';
	public const DIVORCED = 'rozvedený';
	public const WIDOWED = 'ovdovělý';
	public const REGISTERED = 'registrované partnerství';
	public const DOMESTIC_MALE = 'druh';
	public const DOMESTIC_FEMALE = 'družka';

	public const VALID_STATUSES = [
		self::MARRIED,
		self::SINGLE,
		self::DIVORCED,
		self::WIDOWED,
		self::REGISTERED,
		self::DOMESTIC_MALE,
		self::DOMESTIC_FEMALE,
	];

}
