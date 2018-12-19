<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Enum;

final class Education
{

	public const ELEMENTARY = 'základní';
	public const APPRENTICESHIP = 'vyučený';
	public const APPRENTICESHIP_GRADUATE = 'vyučený s maturitou';
	public const FULL_SECONDARY = 'středoškolské vzdělání odborné';
	public const FULL_GENERAL = 'středoškolské vzdělání všeobecné';
	public const TERTIARY_TECHNICAL = 'vyšší odborné vzdělávání';
	public const HIGH_SCHOOL = 'vysokoškolské vzdělávání';
	public const OTHER = 'jiné';

	public const VALID_EDUCATION = [
		self::ELEMENTARY,
		self::APPRENTICESHIP,
		self::APPRENTICESHIP_GRADUATE,
		self::FULL_SECONDARY,
		self::FULL_GENERAL,
		self::TERTIARY_TECHNICAL,
		self::HIGH_SCHOOL,
		self::OTHER,
	];

}
