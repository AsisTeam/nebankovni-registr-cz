<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Enum;

final class PreScoringReason
{

	public const INVALID_PERSON_ID = 'Invalid person ID';
	public const INVALID_NAME = 'Invalid name';
	public const PERSON_NO_MATCH = 'Person ID and name do not match';
	public const HISTORICAL_AML = 'Historical control of the persons AML';
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

}
