<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Lustration;

use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;

final class ShareData
{

	/** @var string */
	private $result;

	/** @var int */
	private $loanApplications;

	/** @var int */
	private $rejectedLoanApplication;

	/** @var int */
	private $activeLoanApplication;

	/** @var int */
	private $activeLoans;

	/** @var int */
	private $delayedLoans;

	/** @var int */
	private $issuedLoansSum;

	/** @var int */
	private $averageTimeOfPaid;

	public function __construct(
		string $result,
		int $loanApplications = 0,
		int $rejectedLoanApplication = 0,
		int $activeLoanApplication = 0,
		int $activeLoans = 0,
		int $delayedLoans = 0,
		int $issuedLoansSum = 0,
		int $averageTimeOfPaid = 0
	)
	{
		if (!in_array($result, ResultEnum::VALID_RESULTS, true)) {
			throw new InvalidArgumentException(sprintf('Lustration API invalid certificate result: %s', $result));
		}

		$this->result = $result;
		$this->loanApplications = $loanApplications;
		$this->rejectedLoanApplication = $rejectedLoanApplication;
		$this->activeLoanApplication = $activeLoanApplication;
		$this->activeLoans = $activeLoans;
		$this->delayedLoans = $delayedLoans;
		$this->issuedLoansSum = $issuedLoansSum;
		$this->averageTimeOfPaid = $averageTimeOfPaid;
	}

	public function getResult(): string
	{
		return $this->result;
	}

	public function getLoanApplications(): int
	{
		return $this->loanApplications;
	}

	public function getRejectedLoanApplication(): int
	{
		return $this->rejectedLoanApplication;
	}

	public function getActiveLoanApplication(): int
	{
		return $this->activeLoanApplication;
	}

	public function getActiveLoans(): int
	{
		return $this->activeLoans;
	}

	public function getDelayedLoans(): int
	{
		return $this->delayedLoans;
	}

	public function getIssuedLoansSum(): int
	{
		return $this->issuedLoansSum;
	}

	public function getAverageTimeOfPaid(): int
	{
		return $this->averageTimeOfPaid;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['result'] ?? '',
			(int) $data['loan_applications'] ?? 0,
			(int) $data['rejected_loan_applications'] ?? 0,
			(int) $data['active_loan_applications'] ?? 0,
			(int) $data['active_loans'] ?? 0,
			(int) $data['delayed_loans'] ?? 0,
			(int) $data['issued_loans_sum'] ?? 0,
			(int) $data['average_time_of_paid'] ?? 0
		);
	}

}
