<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Integration\Client;

use Contributte\NRCZ\Client\LustrationClientFactory;
use Contributte\NRCZ\Result\Lustration\Certificate;
use Contributte\NRCZ\Result\Lustration\ResultEnum;
use Contributte\NRCZ\Tests\Helper\PersonCreator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class LustrationClientTest extends TestCase
{

	public function testLustWithMinimalPerson(): void
	{
		$client = (new LustrationClientFactory('testresult'))->create();
		$result = $client->lust(PersonCreator::createMinimal());

		Assert::equal('testba49cca3a2b61d2bf089088ctest', $result->getLustration()->getId());
		Assert::equal(ResultEnum::A, $result->getLustration()->getResult());
		Assert::equal(ResultEnum::B, $result->getShareData()->getResult());
		Assert::equal(Certificate::YES, $result->getCertificate()->getResult());
		Assert::equal(2000, $result->getCredit()->getNr());
	}

	/**
	 * @throws Contributte\NRCZ\Exception\Runtime\ResponseException
	 */
	public function testPreScoreResultError(): void
	{
		$client = (new LustrationClientFactory('invalidClientId'))->create();
		$client->lust(PersonCreator::createMinimal());
	}

}

(new LustrationClientTest())->run();
