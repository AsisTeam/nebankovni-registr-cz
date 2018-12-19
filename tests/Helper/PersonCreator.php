<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Tests\Helper;

use AsisTeam\NRCZ\Entity\Address;
use AsisTeam\NRCZ\Entity\Commitments;
use AsisTeam\NRCZ\Entity\DriverLicense;
use AsisTeam\NRCZ\Entity\Employment;
use AsisTeam\NRCZ\Entity\IdentityCard;
use AsisTeam\NRCZ\Entity\Income;
use AsisTeam\NRCZ\Entity\Loan;
use AsisTeam\NRCZ\Entity\Ownership;
use AsisTeam\NRCZ\Entity\Passport;
use AsisTeam\NRCZ\Entity\Person;
use AsisTeam\NRCZ\Enum\Education;
use AsisTeam\NRCZ\Enum\Employment as EmploymentEnum;
use AsisTeam\NRCZ\Enum\MaritalStatus;
use DateTimeImmutable;

final class PersonCreator
{

	public static function createMinimal(): Person
	{
		return new Person('605223/1234', 'Žofinka', 'Čížková');
	}

	public static function createFull(): Person
	{
		$p = self::createMinimal();

		$p->addPhone('+420775222888');
		$p->addPhone('+420493535353');

		$p->addEmail('zofinka@gmail.com');

		$p->setAddress(new Address('Jičínská', 'Praha 3', '12000', '880', '/b'));
		$p->setDeliveryAddress(new Address('Pražská', 'Jičín', '50601', '34'));
		$p->setBankAccount('43/24567890/0100');
		$p->setChildren(2);

		$commitments = new Commitments();
		$commitments->setBanksDebt(1000000);
		$p->setCommitments($commitments);

		$p->setEducation(Education::HIGH_SCHOOL);
		$p->setMaritalStatus(MaritalStatus::DOMESTIC_MALE);

		$p->setIdentityCard(new IdentityCard('1234567890', new DateTimeImmutable('2020-06-20')));
		$p->setDriverLicense(new DriverLicense('EK 12345'));
		$p->setPassport(new Passport('0987654321', new DateTimeImmutable('2025-05-05')));

		$p->setLoan(new Loan(2000000, new DateTimeImmutable('2035-01-01'), 40000, 50));
		$p->setOwnership(new Ownership(true, true));

		$p->setEmployment(new Employment(EmploymentEnum::ENTREPRENEUR, new DateTimeImmutable('2008-08-01')));
		$p->setIncome(new Income(80000, 0));

		return $p;
	}

}
