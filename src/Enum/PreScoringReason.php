<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Enum;

final class PreScoringReason
{

	public const INVALID_PERSON_ID = 'Invalid person ID';
	public const INVALID_NAME = 'Invalid name';
	public const PERSON_NO_MATCH = 'Person ID and name do not match';
	public const HISTORICAL_AML = 'Historical control of the person\'s AML';
	public const POLITICALLY_EXPOSED = 'Politically exposed person';
	public const ACTUAL_INSOLVENCY = 'Actual Insolvency';
	public const INSOLVENCY = 'Insolvency';
	public const HISTORICAL_EXECUTIONS = 'Historical executions';
	public const HISTORICAL_SHARED_D = 'Historical shared data D';
	public const BAD_ID_CARD = 'Bad ID card number';
	public const CHEATING_ID_CARD = 'Cheating OP';
	public const HISTORICAL_INVALID_ID_CARD = 'Historical invalid ID card';
	public const CARD_ID_NOT_ACCORDING_PERSON = 'Card id is not according person id';
	public const HISTORICALLY_UNCREDITWORTHY = 'Historically uncreditworthy person';
	public const HISTORICAL_PERSON_D = 'Historical result D of the person ID';
	public const INVALID_BANK_ACCOUNT = 'Bank account number is invalid';

	public const VALID_REASONS = [
		self::INVALID_PERSON_ID,
		self::INVALID_NAME,
		self::PERSON_NO_MATCH,
		self::HISTORICAL_AML,
		self::POLITICALLY_EXPOSED,
		self::ACTUAL_INSOLVENCY,
		self::INSOLVENCY,
		self::HISTORICAL_EXECUTIONS,
		self::HISTORICAL_SHARED_D,
		self::BAD_ID_CARD,
		self::CHEATING_ID_CARD,
		self::HISTORICAL_INVALID_ID_CARD,
		self::CARD_ID_NOT_ACCORDING_PERSON,
		self::HISTORICALLY_UNCREDITWORTHY,
		self::HISTORICAL_PERSON_D,
		self::INVALID_BANK_ACCOUNT,
	];

}
