<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Request;

use Contributte\NRCZ\Entity\Loan;
use Contributte\NRCZ\Enum\LoanStatus;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;

final class ShareRequest
{

	/**
	 * @return mixed[]
	 */
	public function prepareData(string $lustrationId, string $status, Loan $loan): array
	{
		if ($lustrationId === '') {
			throw new InvalidArgumentException('Empty lustration ID given');
		}

		if (!in_array($status, LoanStatus::VALID_STATUSES, true)) {
			throw new InvalidArgumentException(sprintf('Invalid loan status "%s" given', $status));
		}

		return [
			'lustration_id' => $lustrationId,
			'status' => $status,
			'loan_due_day' => $loan->getDueDate() !== null ? $loan->getDueDate()->format('Y-m-d') : '',
			'loan_debt' => (string) $loan->getAmount(),
		];
	}

}
