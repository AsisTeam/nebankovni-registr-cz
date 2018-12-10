<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

use DateTimeImmutable;

final class Loan
{

	/** @var float */
	private $amount;

	/** @var DateTimeImmutable */
	private $dueDate;

	/** @var float */
	private $monthlyPayment;

	/** @var int */
	private $paymentsCount;

	public function __construct(float $amount, DateTimeImmutable $dueDate, float $monthlyPayment, int $paymentsCount)
	{
		$this->amount = $amount;
		$this->dueDate = $dueDate;
		$this->monthlyPayment = $monthlyPayment;
		$this->paymentsCount = $paymentsCount;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getDueDate(): DateTimeImmutable
	{
		return $this->dueDate;
	}

	public function getMonthlyPayment(): float
	{
		return $this->monthlyPayment;
	}

	public function getPaymentsCount(): int
	{
		return $this->paymentsCount;
	}

}
