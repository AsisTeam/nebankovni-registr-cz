<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Unit\Request;

use Contributte\NRCZ\Entity\IdentityCard;
use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Request\LustrationRequest;
use Contributte\NRCZ\Tests\Helper\PersonCreator;
use DateTimeImmutable;
use Generator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class LustrationRequestTest extends TestCase
{

	/**
	 * @dataProvider dataProvider
	 * @param mixed[]  $expected
	 */
	public function testPrepareDataMinimalPerson(Person $p, array $expected): void
	{
		Assert::equal($expected, (new LustrationRequest())->prepareData($p));
	}

	/**
	 * @return mixed[]
	 */
	public function dataProvider(): Generator
	{
		yield [
			PersonCreator::createMinimal(),
			[
				'fname' => 'Žofinka',
				'sname' => 'Čížková',
				'person_id' => '605223/1234',
			],
		];

		$p = PersonCreator::createMinimal();
		$p->addEmail('some@mail.com');
		$p->addPhone('775222555');
		$p->addPhone('775222556');
		$p->setBankAccount('43-252525/0100');
		$p->setIdentityCard(new IdentityCard('123456789', new DateTimeImmutable('2020-05-05')));
		yield [
			$p,
			[
				'fname' => 'Žofinka',
				'sname' => 'Čížková',
				'person_id' => '605223/1234',
				'bank_account' => '43-252525/0100',
				'phone' => '775222555',
				'phone2' => '775222556',
				'email' => 'some@mail.com',
				'email2' => '',
				'card_id' => '123456789',
				'card_validity' => '2020-05-05',
			],
		];

		$p = PersonCreator::createFull();
		yield [
			$p,
			[
				'fname' => 'Žofinka',
				'sname' => 'Čížková',
				'person_id' => '605223/1234',
				'bank_account' => '43/24567890/0100',
				'phone' => '+420775222888',
				'phone2' => '+420493535353',
				'email' => 'zofinka@gmail.com',
				'email2' => '',
				'marital_status' => 'druh',
				'highest_degree' => 'vysokoškolské vzdělávání',
				'num_children' => 2,
				'street' => 'Jičínská',
				'street_num' => '880',
				'street_num_desc' => '/b',
				'city' => 'Praha 3',
				'zip_code' => '12000',
				'delivery_street' => 'Pražská',
				'delivery_street_num' => '34',
				'delivery_street_num_desc' => '',
				'delivery_city' => 'Jičín',
				'delivery_zip_code' => '50601',
				'card_id' => '1234567890',
				'card_validity' => '2020-06-20',
				'passport_id' => '0987654321',
				'passport_validity' => '2025-05-05',
				'drivers_license_num' => 'EK 12345',
				'loan_amount' => 2000000.0,
				'loan_due_day' => '2035-01-01',
				'loan_monthly_payment' => 40000.0,
				'loan_number_payments' => 50,
				'immovable_property' => 'ano',
				'car' => 'ano',
				'type_of_employment' => 'podnikatel',
				'start_of_employment' => '2008-08-01',
				'end_of_employment' => '',
				'profession' => '',
				'entrepreneurship' => '',
				'employer_name' => '',
				'employer_id' => '',
				'employer_phone' => '',
				'net_monthly_income' => 80000,
				'income_family_members' => 0,
				'bank_debt' => 1000000,
				'debt_non_bank_providers' => '',
				'total_debt_for_execution' => '',
				'debt_insolvencies' => '',
				'alimony' => '',
				'other_regular_deduction_from_wages' => '',
				'constandard_living_costs' => '',
				'debt_tax_social_health_insurance' => '',
			],
		];
	}

}

(new LustrationRequestTest())->run();
