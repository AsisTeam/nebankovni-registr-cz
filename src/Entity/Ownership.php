<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Entity;

final class Ownership
{

	/** @var bool|null */
	private $immovableProperty;

	/** @var bool|null */
	private $car;

	public function __construct(
		?bool $immovableProperty = null,
		?bool $car = null
	)
	{
		$this->immovableProperty = $immovableProperty;
		$this->car = $car;
	}

	public function hasImmovableProperty(): ?bool
	{
		return $this->immovableProperty;
	}

	public function hasCar(): ?bool
	{
		return $this->car;
	}

}
