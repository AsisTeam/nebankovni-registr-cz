<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result;

use AsisTeam\NRCZ\Enum\PreScoringReason;
use AsisTeam\NRCZ\Exception\Logical\UnknownReasonException;
use AsisTeam\NRCZ\Exception\Runtime\ResponseException;
use AsisTeam\NRCZ\Result\Validator\ResultValidator;

final class PreScoringResult
{

	private const YES = 'yes';
	private const NO = 'no';

	/** @var string */
	private $result;

	/** @var string */
	private $birthDay;

	/** @var string */
	private $nameDay;

	/** @var string */
	private $reason;

	public function __construct(string $result, string $birthDay, string $nameDay, string $reason)
	{
		if (!$this->isValidResult($result)) {
			throw new ResponseException('PreScore API result failure: ' . $result);
		}

		if (strlen($reason) > 0 && !in_array($reason, PreScoringReason::VALID_REASONS, true)) {
			throw new UnknownReasonException($reason);
		}

		$this->result = $result;
		$this->birthDay = $birthDay;
		$this->nameDay = $nameDay;
		$this->reason = $reason;
	}

	public function getResult(): string
	{
		return $this->result;
	}

	public function isPositive(): bool
	{
		return $this->result === self::YES;
	}

	public function hasBirthDay(): bool
	{
		return $this->birthDay === self::YES;
	}

	public function hasNameDay(): bool
	{
		return $this->nameDay === self::YES;
	}

	public function getReason(): string
	{
		return $this->reason;
	}

	/**
	 * @param mixed[] $data
	 */
	public static function fromArray(array $data): self
	{
		if (!array_key_exists('result', $data)) {
			throw new ResponseException('PreScore API response "result" field missing');
		}

		ResultValidator::validate($data['result']);

		return new self($data['result'], $data['birthday'] ?? '', $data['name_day'] ?? '', $data['reason'] ?? '');
	}

	private function isValidResult(string $result): bool
	{
		return $result === self::YES || $result === self::NO;
	}

}
