<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Tests\Cases\Unit\Client;

use AsisTeam\NRCZ\Client\PreScoringClient;
use AsisTeam\NRCZ\Tests\Helper\PersonCreator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class PreScoringClientTest extends TestCase
{

	public function testPreScorePositiveWithMinimalPerson(): void
	{
		$soap = SoapMockHelper::createSoapMock('pre_scoring_result_positive.json');
		$client = new PreScoringClient($soap, 'clientId');

		$result = $client->preScore(PersonCreator::createMinimal());

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testPreScorePositive(): void
	{
		$soap = SoapMockHelper::createSoapMock('pre_scoring_result_positive.json');
		$client = new PreScoringClient($soap, 'clientId');

		$result = $client->preScore(PersonCreator::createFull());

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testPreScoreNegative(): void
	{
		$soap = SoapMockHelper::createSoapMock('pre_scoring_result_negative.json');
		$client = new PreScoringClient($soap, 'clientId');

		$result = $client->preScore(PersonCreator::createMinimal());

		Assert::false($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('Historical control of the person\'s AML', $result->getReason());
	}

	/**
	 * @throws AsisTeam\NRCZ\Exception\Runtime\ResponseException
	 */
	public function testPreScoreResultError(): void
	{
		$soap = SoapMockHelper::createSoapMock('error_result.json');
		$client = new PreScoringClient($soap, 'invalidClientId');
		$client->preScore(PersonCreator::createMinimal());
	}

}

(new PreScoringClientTest())->run();
