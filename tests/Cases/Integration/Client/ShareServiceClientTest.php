<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Integration\Client;

use Contributte\NRCZ\Client\ShareServiceClientFactory;
use Contributte\NRCZ\Entity\Loan;
use Contributte\NRCZ\Enum\LoanStatus;
use Tester\Assert;
use Tester\Environment;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class ShareServiceClientTest extends TestCase
{

	public function testLustrateThenShare(): void
	{
		Environment::skip();
		$client = (new ShareServiceClientFactory('testinput'))->create();
		$result = $client->share('testba49cca3a2b61d2bf089088ctest', LoanStatus::NO_CHANGE, new Loan(100000));

		Assert::equal('testba49cca3a2b61d2bf089088ctest', $result->getLustration()->getId());
	}


	/**
	 * @throws Contributte\NRCZ\Exception\Runtime\ResponseException
	 */
	public function testShareResultError(): void
	{
		$client = (new ShareServiceClientFactory('invalidClientId'))->create();
		$client->share('123', LoanStatus::NO_CHANGE, new Loan(0));
	}

}

(new ShareServiceClientTest())->run();
