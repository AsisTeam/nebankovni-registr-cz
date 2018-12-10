<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

use DateTimeImmutable;

final class Loan
{

	/** @var int */
	private $amount;

	/** @var DateTimeImmutable|null */
	private $dueDate;

	/** @var int|null */
	private $monthlyPayment;

	/** @var int|null */
	private $paymentsCount;

	public function __construct(int $amount, ?DateTimeImmutable $dueDate = null, ?int $monthlyPayment = null, ?int $paymentsCount = null)
	{
		$this->amount = $amount;
		$this->dueDate = $dueDate;
		$this->monthlyPayment = $monthlyPayment;
		$this->paymentsCount = $paymentsCount;
	}

	public function getAmount(): int
	{
		return $this->amount;
	}

	public function getDueDate(): ?DateTimeImmutable
	{
		return $this->dueDate;
	}

	public function getMonthlyPayment(): ?int
	{
		return $this->monthlyPayment;
	}

	public function getPaymentsCount(): ?int
	{
		return $this->paymentsCount;
	}

}
