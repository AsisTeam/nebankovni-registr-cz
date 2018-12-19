<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Entity;

final class Income
{

	/** @var int */
	private $netMonthlyIncome;

	/** @var int|null */
	private $incomeFamilyMembers;

	public function __construct(int $netMonthlyIncome, ?int $incomeFamilyMembers = null)
	{
		$this->netMonthlyIncome = $netMonthlyIncome;
		$this->incomeFamilyMembers = $incomeFamilyMembers;
	}

	public function getNetMonthlyIncome(): int
	{
		return $this->netMonthlyIncome;
	}

	public function getIncomeFamilyMembers(): ?int
	{
		return $this->incomeFamilyMembers;
	}

}
