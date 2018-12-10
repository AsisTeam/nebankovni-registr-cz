<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

use DateTimeImmutable;

abstract class PersonalDocument
{

	/** @var string|null */
	private $id;

	/** @var DateTimeImmutable|null */
	private $validity;

	public function __construct(?string $id = null, ?DateTimeImmutable $validity = null)
	{
		$this->id = $id;
		$this->validity = $validity;
	}

	public function getId(): ?string
	{
		return $this->id;
	}

	public function getValidity(): ?DateTimeImmutable
	{
		return $this->validity;
	}

}
