<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Lustration;

use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;

final class Lustration
{

	/** @var string */
	private $id;

	/** @var string */
	private $result;

	/** @var float|null */
	private $dti;

	/** @var float|null */
	private $dsti;

	/** @var float|null */
	private $ltv;

	public function __construct(string $id, string $result, ?float $dti = null, ?float $dsti = null, ?float $ltv = null)
	{
		if (!in_array($result, ResultEnum::VALID_RESULTS, true)) {
			throw new InvalidArgumentException(sprintf('Lustration API invalid lustration result: %s', $result));
		}

		$this->id = $id;
		$this->result = $result;
		$this->dti = $dti;
		$this->dsti = $dsti;
		$this->ltv = $ltv;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getResult(): string
	{
		return $this->result;
	}

	public function getDti(): ?float
	{
		return $this->dti;
	}

	public function getDsti(): ?float
	{
		return $this->dsti;
	}

	public function getLtv(): ?float
	{
		return $this->ltv;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['id'] ?? '',
			$data['result'] ?? '',
			isset($data['dti']) ? floatval($data['dti']) : null,
			isset($data['dsti']) ? floatval($data['dsti']) : null,
			isset($data['ltv']) ? floatval($data['ltv']) : null
		);
	}

}
