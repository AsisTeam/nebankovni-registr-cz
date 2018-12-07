<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

final class Person
{

	/** @var string */
	private $personalId;

	/** @var string */
	private $firstName;

	/** @var string */
	private $lastName;

	/** @var string|null */
	private $bankAccount;

	/** @var string[] */
	private $phones = [];

	/** @var string[] */
	private $emails = [];

	/** @var string|null */
	private $idCardNumber;

	public function __construct(string $personalId, string $firstName, string $lastName)
	{
		$this->personalId = $personalId;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function getPersonalId(): string
	{
		return $this->personalId;
	}

	public function setId(string $id): void
	{
		$this->personalId = $id;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): void
	{
		$this->firstName = $firstName;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): void
	{
		$this->lastName = $lastName;
	}

	public function getBankAccount(): ?string
	{
		return $this->bankAccount;
	}

	public function setBankAccount(string $bankAccount): void
	{
		$this->bankAccount = $bankAccount;
	}

	/**
	 * @return string[]
	 */
	public function getPhones(): array
	{
		return $this->phones;
	}

	/**
	 * @param string[] $phones
	 */
	public function setPhones(array $phones): void
	{
		$this->phones = $phones;
	}

	public function addPhone(string $number): void
	{
		$this->phones[] = $number;
	}

	/**
	 * @return string[]
	 */
	public function getEmails(): array
	{
		return $this->emails;
	}

	/**
	 * @param string[] $emails
	 */
	public function setEmails(array $emails): void
	{
		$this->emails = $emails;
	}

	public function addEmail(string $email): void
	{
		$this->emails[] = $email;
	}

	public function getIdCardNumber(): ?string
	{
		return $this->idCardNumber;
	}

	public function setIdCardNumber(string $idCardNumber): void
	{
		$this->idCardNumber = $idCardNumber;
	}

}
