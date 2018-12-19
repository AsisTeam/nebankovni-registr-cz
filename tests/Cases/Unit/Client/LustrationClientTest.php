<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Tests\Cases\Unit\Client;

use AsisTeam\NRCZ\Client\LustrationClient;
use AsisTeam\NRCZ\Result\Lustration\Certificate;
use AsisTeam\NRCZ\Result\Lustration\ResultEnum;
use AsisTeam\NRCZ\Tests\Helper\PersonCreator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class LustrationClientTest extends TestCase
{

	public function testLustWithMinimalPerson(): void
	{
		$soap = SoapMockHelper::createSoapMock('lustration_result.json');
		$client = new LustrationClient($soap, 'clientID');
		$result = $client->lust(PersonCreator::createMinimal());

		Assert::equal('testba49cca3a2b61d2bf089088ctest', $result->getLustration()->getId());
		Assert::equal(ResultEnum::A, $result->getLustration()->getResult());
		Assert::equal(ResultEnum::B, $result->getShareData()->getResult());
		Assert::equal(Certificate::YES, $result->getCertificate()->getResult());
		Assert::equal(2000, $result->getCredit()->getNr());
	}

	/**
	 * @throws AsisTeam\NRCZ\Exception\Runtime\ServiceNotAllowedException
	 */
	public function testPreScoreResultError(): void
	{
		$soap = SoapMockHelper::createSoapMock('error_result.json');
		$client = new LustrationClient($soap, 'invalidClientId');

		$client->lust(PersonCreator::createMinimal());
	}

}

(new LustrationClientTest())->run();
