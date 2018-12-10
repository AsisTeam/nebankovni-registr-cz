<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Unit\Request;

use Contributte\NRCZ\Entity\IdentityCard;
use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Request\PreScoringRequest;
use Contributte\NRCZ\Tests\Helper\PersonCreator;
use DateTimeImmutable;
use Generator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class PreScoringRequestTest extends TestCase
{

	/**
	 * @dataProvider dataProvider
	 * @param mixed[]  $expected
	 */
	public function testPrepareDataMinimalPerson(Person $p, array $expected): void
	{
		Assert::equal($expected, (new PreScoringRequest())->prepareData($p));
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
		$p->setBankAccount('43-252525/0100');
		$p->setIdentityCard(new IdentityCard('123456789', new DateTimeImmutable('2020-05-05')));
		yield [
			$p,
			[
				'fname' => 'Žofinka',
				'sname' => 'Čížková',
				'person_id' => '605223/1234',
				'bank_account' => '43-252525/0100',
				'email' => 'some@mail.com',
				'phone' => '775222555',
				'op' => '123456789',
			],
		];
	}

}

(new PreScoringRequestTest())->run();
