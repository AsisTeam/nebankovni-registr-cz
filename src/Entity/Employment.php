<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use DateTimeImmutable;

final class Employment
{

	/** @var string */
	private $type;

	/** @var DateTimeImmutable */
	private $start;

	/** @var DateTimeImmutable|null */
	private $end;

	/** @var string|null */
	private $profession = '';

	/** @var string|null */
	private $entrepreneurship = '';

	/** @var string */
	private $employerName = '';

	/** @var string */
	private $employerId = '';

	/** @var string */
	private $employerPhone = '';

	public function __construct(string $type, DateTimeImmutable $start, ?DateTimeImmutable $end = null)
	{
		if (!in_array($type, \Contributte\NRCZ\Enum\Employment::VALID_EMPLOYMENT, true)) {
			throw new InvalidArgumentException(sprintf('Invalid employment type "%s" given', $type));
		}

		$this->type = $type;
		$this->start = $start;
		$this->end = $end;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function getStart(): DateTimeImmutable
	{
		return $this->start;
	}

	public function getEnd(): ?DateTimeImmutable
	{
		return $this->end;
	}

	public function getProfession(): ?string
	{
		return $this->profession;
	}

	public function setProfession(?string $profession): void
	{
		$this->profession = $profession;
	}

	public function getEntrepreneurship(): ?string
	{
		return $this->entrepreneurship;
	}

	public function setEntrepreneurship(?string $entrepreneurship): void
	{
		$this->entrepreneurship = $entrepreneurship;
	}

	public function getEmployerName(): string
	{
		return $this->employerName;
	}

	public function setEmployerName(string $employerName): void
	{
		$this->employerName = $employerName;
	}

	public function getEmployerId(): string
	{
		return $this->employerId;
	}

	public function setEmployerId(string $employerId): void
	{
		$this->employerId = $employerId;
	}

	public function getEmployerPhone(): string
	{
		return $this->employerPhone;
	}

	public function setEmployerPhone(string $employerPhone): void
	{
		$this->employerPhone = $employerPhone;
	}

}
