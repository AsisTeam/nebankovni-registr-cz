<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result\Lustration;

final class CurrentCredit
{

	/** @var int */
	private $nr;

	/** @var int */
	private $cee;

	/** @var int */
	private $employerConfirmation;

	/** @var int */
	private $lustrationEmployer;

	/** @var int */
	private $postalServices;

	public function __construct(
		int $nr,
		int $cee,
		int $employerConfirmation,
		int $lustrationEmployer,
		int $postalServices
	)
	{
		$this->nr = $nr;
		$this->cee = $cee;
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
	 * @param mixed[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			(int) $data['NR'] ?? 0,
			(int) $data['CEE'] ?? 0,
			(int) $data['employers_confirmation'] ?? 0,
			(int) $data['lustration_employer'] ?? 0,
			(int) $data['postal_services'] ?? 0
		);
	}

}
