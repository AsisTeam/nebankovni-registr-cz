<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Entity;

use AsisTeam\NRCZ\Enum\Education;
use AsisTeam\NRCZ\Enum\MaritalStatus;
use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;

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

	/** @var string|null */
	private $maritalStatus;

	/** @var string|null */
	private $education;

	/** @var int|null */
	private $children;

	/** @var string[] */
	private $phones = [];

	/** @var string[] */
	private $emails = [];

	/** @var string[] */
	private $ipAddresses = [];

	/** @var Address|null */
	private $address;

	/** @var Address|null */
	private $deliveryAddress;

	/** @var IdentityCard|null */
	private $identityCard;

	/** @var Passport|null */
	private $passport;

	/** @var DriverLicense|null */
	private $driverLicense;

	/** @var Loan|null */
	private $loan;

	/** @var Ownership|null */
	private $ownership;

	/** @var Employment|null */
	private $employment;

	/** @var Income|null */
	private $income;

	/** @var Commitments|null */
	private $commitments;

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

	public function getMaritalStatus(): ?string
	{
		return $this->maritalStatus;
	}

	public function setMaritalStatus(?string $maritalStatus): void
	{
		if ($maritalStatus !== null) {
			if (!in_array($maritalStatus, MaritalStatus::VALID_STATUSES, true)) {
				throw new InvalidArgumentException(sprintf('Invalid marital status "%s" given', $maritalStatus));
			}
		}

		$this->maritalStatus = $maritalStatus;
	}

	public function getEducation(): ?string
	{
		return $this->education;
	}

	public function setEducation(?string $education): void
	{
		if ($education !== null) {
			if (!in_array($education, Education::VALID_EDUCATION, true)) {
				throw new InvalidArgumentException(sprintf('Invalid education "%s" given', $education));
			}
		}

		$this->education = $education;
	}

	public function getChildren(): ?int
	{
		return $this->children;
	}

	public function setChildren(?int $children): void
	{
		$this->children = $children;
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

	/**
	 * @return string[]
	 */
	public function getIpAddresses(): array
	{
		return $this->ipAddresses;
	}

	/**
	 * @param string[] $ips
	 */
	public function setIpAddresses(array $ips): void
	{
		$this->ipAddresses = $ips;
	}

	public function addIpAddress(string $ip): void
	{
		$this->ipAddresses[] = $ip;
	}

	public function getAddress(): ?Address
	{
		return $this->address;
	}

	public function setAddress(?Address $address): void
	{
		$this->address = $address;
	}

	public function getDeliveryAddress(): ?Address
	{
		return $this->deliveryAddress;
	}

	public function setDeliveryAddress(?Address $deliveryAddress): void
	{
		$this->deliveryAddress = $deliveryAddress;
	}

	public function getIdentityCard(): ?IdentityCard
	{
		return $this->identityCard;
	}

	public function setIdentityCard(?IdentityCard $identityCard): void
	{
		$this->identityCard = $identityCard;
	}

	public function getPassport(): ?Passport
	{
		return $this->passport;
	}

	public function setPassport(?Passport $passport): void
	{
		$this->passport = $passport;
	}

	public function getDriverLicense(): ?DriverLicense
	{
		return $this->driverLicense;
	}

	public function setDriverLicense(?DriverLicense $driverLicense): void
	{
		$this->driverLicense = $driverLicense;
	}

	public function getLoan(): ?Loan
	{
		return $this->loan;
	}

	public function setLoan(?Loan $loan): void
	{
		$this->loan = $loan;
	}

	public function getOwnership(): ?Ownership
	{
		return $this->ownership;
	}

	public function setOwnership(?Ownership $ownership): void
	{
		$this->ownership = $ownership;
	}

	public function getEmployment(): ?Employment
	{
		return $this->employment;
	}

	public function setEmployment(?Employment $employment): void
	{
		$this->employment = $employment;
	}

	public function getIncome(): ?Income
	{
		return $this->income;
	}

	public function setIncome(?Income $income): void
	{
		$this->income = $income;
	}

	public function getCommitments(): ?Commitments
	{
		return $this->commitments;
	}

	public function setCommitments(?Commitments $commitments): void
	{
		$this->commitments = $commitments;
	}

}
