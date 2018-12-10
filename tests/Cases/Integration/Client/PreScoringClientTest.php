<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Integration\Client;

use Contributte\NRCZ\Client\PreScoringClientFactory;
use Contributte\NRCZ\Tests\Helper\PersonCreator;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class PreScoringClientTest extends TestCase
{

	public function testPreScorePositiveWithMinimalPerson(): void
	{
		$client = (new PreScoringClientFactory('testresultano'))->create();
		$result = $client->preScore(PersonCreator::createMinimal());

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testPreScorePositive(): void
	{
		$client = (new PreScoringClientFactory('testresultano'))->create();
		$result = $client->preScore(PersonCreator::createFull());

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testPreScoreNegative(): void
	{
		$client = (new PreScoringClientFactory('testresultne'))->create();
		$result = $client->preScore(PersonCreator::createMinimal());

		Assert::false($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('Historical control of the person\'s AML', $result->getReason());
	}

	/**
	 * @throws Contributte\NRCZ\Exception\Runtime\ResponseException
	 */
	public function testPreScoreResultError(): void
	{
		$client = (new PreScoringClientFactory('invalidClientId'))->create();
		$client->preScore(PersonCreator::createMinimal());
	}

}

(new PreScoringClientTest())->run();
