<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Client;

use Contributte\NRCZ\Client\PreScoringClientFactory;
use Contributte\NRCZ\Entity\Person;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../bootstrap.php';

class PreScoringClientTest extends TestCase
{

	/** @var Person */
	private $person;

	public function setUp(): void
	{
		$this->person = new Person('605223/1234', 'Žofinka', 'Čížková');
	}

	public function testPreScorePositive(): void
	{
		$client = (new PreScoringClientFactory('testresultano'))->create();
		$result = $client->preScore($this->person);

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testPreScoreNegative(): void
	{
		$client = (new PreScoringClientFactory('testresultne'))->create();
		$result = $client->preScore($this->person);

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
		$client->preScore($this->person);
	}

}

(new PreScoringClientTest())->run();
