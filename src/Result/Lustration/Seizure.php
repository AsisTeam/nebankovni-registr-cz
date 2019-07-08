<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Lustration;

use DateTimeImmutable;

final class Seizure
{

	/** @var Subject[] */
	private $subjects = [];

	/** @var int */
	private $subjectsCount = 0;

	/** @var string */
	private $code;

	/** @var DateTimeImmutable */
	private $createdAt;

	/** @var DateTimeImmutable */
	private $wroteAt;

	/** @var string */
	private $lastChange;

	/**
	 * @param Subject[] $subjects
	 */
	public function __construct(
		string $code,
		DateTimeImmutable $createdAt,
		DateTimeImmutable $wroteAt,
		string $lastChange,
		array $subjects
	)
	{
		$this->code = $code;
		$this->createdAt = $createdAt;
		$this->wroteAt = $wroteAt;
		$this->lastChange = $lastChange;
		$this->addSubjects(... $subjects);
	}

	/**
	 * @return Subject[]
	 */
	public function getSubjects(): array
	{
		return $this->subjects;
	}

	public function getSubjectsCount(): int
	{
		return $this->subjectsCount;
	}

	public function getCode(): string
	{
		return $this->code;
	}

	public function getCreatedAt(): DateTimeImmutable
	{
		return $this->createdAt;
	}

	public function getWroteAt(): DateTimeImmutable
	{
		return $this->wroteAt;
	}

	public function getLastChange(): string
	{
		return $this->lastChange;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['ex_cislo'] ?? '',
			isset($data['datetime_zalozeni']) ? new DateTimeImmutable($data['datetime_zalozeni']) : new DateTimeImmutable('0000-00-00'),
			isset($data['datetime_zapisu']) ? new DateTimeImmutable($data['datetime_zapisu']) : new DateTimeImmutable('0000-00-00'),
			$data['posledni_uprava'] ?? '',
			//isset($data['subjects']) ? array_map(function($subject) {
			//	return Subject::fromArray($subject);
			//}, $data['subjects']) : []
			[]
		);
	}

	protected function addSubjects(Subject ... $subjects): self
	{
		$this->subjects = array_merge($this->subjects, $subjects);
		$this->subjectsCount = count($this->subjects);

		return $this;
	}

}
