<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Lustration;

use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;

final class Person
{

	/** @var string */
	private $result;

	public function __construct(string $result)
	{
		if (!in_array($result, ResultEnum::VALID_RESULTS, true)) {
			throw new InvalidArgumentException(sprintf('Lustration API invalid person result: %s', $result));
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
