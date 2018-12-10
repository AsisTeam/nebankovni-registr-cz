<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Lustration;

use Contributte\NRCZ\Enum\Boolean;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;

final class Certificate
{

	public const YES = Boolean::YES;
	public const NO = Boolean::NO;
	public const MISSING = 'chybi';

	public const VALID_RESULTS = [self::YES, self::NO, self::MISSING];

	/** @var string */
	private $result;

	public function __construct(string $result)
	{
		if (!in_array($result, self::VALID_RESULTS, true)) {
			throw new InvalidArgumentException(sprintf('Lustration API invalid certificate result: %s', $result));
		}

		$this->result = $result;
	}

	public function getResult(): string
	{
		return $this->result;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self($data['result'] ?? '');
	}

}
