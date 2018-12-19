<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Tests\Cases\Unit\Request;

use AsisTeam\NRCZ\Entity\Loan;
use AsisTeam\NRCZ\Enum\LoanStatus;
use AsisTeam\NRCZ\Request\ShareRequest;
use Generator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class ShareServiceRequestTest extends TestCase
{

	/**
	 * @dataProvider dataProvider
	 * @param mixed[]  $expected
	 */
	public function testPrepareData(string $lid, string $status, Loan $loan, array $expected): void
	{
		Assert::equal($expected, (new ShareRequest())->prepareData($lid, $status, $loan));
	}

	/**
	 * @return mixed[]
	 */
	public function dataProvider(): Generator
	{
		yield [
			'123',
			LoanStatus::APPROVED,
			new Loan(1000000),
			[
				'lustration_id' => '123',
				'status' => LoanStatus::APPROVED,
				'loan_due_day' => '',
				'loan_debt' => '1000000',
			],
		];
	}

}

(new ShareServiceRequestTest())->run();
