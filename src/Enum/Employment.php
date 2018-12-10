<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Enum;

final class Employment
{

	public const TEMPORARY = 'zaměstnání na dobu určitou';
	public const PERMANENT = 'zaměstnání na dobu neurčitou';
	public const ENTREPRENEUR = 'podnikatel';
	public const STUDENT = 'student';
	public const UNEMPLOYED = 'nezaměstnaný';
	public const FREELANCE = 'svobodné povolání';
	public const HOUSEHOLD = 'v domácnosti';
	public const EMPLOYMENT_AGREEMENT = 'dohoda o provední práce';
	public const WORK_AGREEMENT = 'dohoda o pracovní činnosti';
	public const RENTIER = 'důchodce - starobní';
	public const DISABILITY_RETIREMENT = 'důchodce - invalidní';
	public const PART_TIME = 'brigádník';
	public const MATERNITY_LEAVE = 'mateřská dovolená';
	public const PARENTAL_LEAVE = 'rodičovská dovolená';

	public const VALID_EMPLOYMENT = [
		self::TEMPORARY,
		self::PERMANENT,
		self::ENTREPRENEUR,
		self::STUDENT,
		self::UNEMPLOYED,
		self::FREELANCE,
		self::HOUSEHOLD,
		self::EMPLOYMENT_AGREEMENT,
		self::WORK_AGREEMENT,
		self::RENTIER,
		self::DISABILITY_RETIREMENT,
		self::PART_TIME,
		self::MATERNITY_LEAVE,
		self::PARENTAL_LEAVE,
	];

}
