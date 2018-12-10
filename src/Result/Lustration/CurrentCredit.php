<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Lustration;

final class CurrentCredit
{

	/** @var int */
	private $nr;

	/** @var int */
	private $cee;

	/** @var int */
	private $leadScoring;

	/** @var int */
	private $employerConfirmation;

	/** @var int */
	private $lustrationEmployer;

	/** @var int */
	private $postalServices;

	public function __construct(
		int $nr,
		int $cee,
		int $leadScoring,
		int $employerConfirmation,
		int $lustrationEmployer,
		int $postalServices
	)
	{
		$this->nr = $nr;
		$this->cee = $cee;
		$this->leadScoring = $leadScoring;
		$this->employerConfirmation = $employerConfirmation;
		$this->lustrationEmployer = $lustrationEmployer;
		$this->postalServices = $postalServices;
	}

	public function getNr(): int
	{
		return $this->nr;
	}

	public function getCee(): int
	{
		return $this->cee;
	}

	public function getLeadScoring(): int
	{
		return $this->leadScoring;
	}

	public function getEmployerConfirmation(): int
	{
		return $this->employerConfirmation;
	}

	public function getLustrationEmployer(): int
	{
		return $this->lustrationEmployer;
	}

	public function getPostalServices(): int
	{
		return $this->postalServices;
	}

	/**
	 * @param int[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['NR'] ?? 0,
			$data['CEE'] ?? 0,
			$data['leadscoring'] ?? 0,
			$data['employers_confirmation'] ?? 0,
			$data['lustration_employer'] ?? 0,
			$data['postal_services'] ?? 0
		);
	}

}
