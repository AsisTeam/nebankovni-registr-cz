<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result\Lustration;

use DateTimeImmutable;

final class Subject
{

	/** @var string */
	private $type;

	/** @var string */
	private $name;

	/** @var DateTimeImmutable|null */
	private $bornAt;

	/** @var string|null - person identification number */
	private $in;

	/** @var string|null */
	private $address;

	public function __construct(string $type, string $name, ?DateTimeImmutable $bornAt, ?string $in, ?string $address)
	{
		$this->type = $type;
		$this->name = $name;
		$this->bornAt = $bornAt;
		$this->in = $in;
		$this->address = $address;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getBornAt(): ?DateTimeImmutable
	{
		return $this->bornAt;
	}

	public function getIn(): ?string
	{
		return $this->in;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * @param string[] $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['typ_osoby'] ?? '',
			$data['jmeno'] ?? '',
			isset($data['datum_narozeni']) ? new DateTimeImmutable($data['datum_narozeni']) : null,
			$data['ic'],
			$data['adresa']
		);
	}

}
