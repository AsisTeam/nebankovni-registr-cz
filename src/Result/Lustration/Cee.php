<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Lustration;

final class Cee
{

	/** @var Seizure[] */
	private $lastKnown = [];

	/** @var Seizure[] */
	private $historical = [];

	/**
	 * @param Seizure[] $lastKnown
	 * @param Seizure[] $historical
	 */
	public function __construct(array $lastKnown, array $historical)
	{
		$this->addLastKnown(... $lastKnown);
		$this->addHistorical(... $historical);
	}

	/**
	 * @return Seizure[]
	 */
	public function getLastKnown(): array
	{
		return $this->lastKnown;
	}

	/**
	 * @return Seizure[]
	 */
	public function getHistorical(): array
	{
		return $this->historical;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		$f = function ($item) {
			return Seizure::fromArray($item);
		};
		return new self(
			isset($data['last_known']['data']) ? array_map($f, $data['last_known']['data']) : [],
			isset($data['historical']['data']) ? array_map($f, $data['historical']['data']) : []
		);
	}

	protected function addLastKnown(Seizure ... $seizures): self
	{
		$this->lastKnown = array_merge($this->lastKnown, $seizures);

		return $this;
	}

	protected function addHistorical(Seizure ... $seizures): self
	{
		$this->historical = array_merge($this->historical, $seizures);

		return $this;
	}

}
