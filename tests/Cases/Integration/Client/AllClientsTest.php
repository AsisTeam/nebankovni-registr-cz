<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Integration\Client;

use Contributte\NRCZ\Client\LustrationClientFactory;
use Contributte\NRCZ\Client\PreScoringClientFactory;
use Contributte\NRCZ\Client\ShareServiceClientFactory;
use Contributte\NRCZ\Entity\Loan;
use Contributte\NRCZ\Enum\LoanStatus;
use Contributte\NRCZ\Result\Lustration\Certificate;
use Contributte\NRCZ\Result\Lustration\ResultEnum;
use Contributte\NRCZ\Tests\Helper\PersonCreator;
use DateTimeImmutable;
use Tester\Assert;
use Tester\Environment;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class AllClientsTest extends TestCase
{

	/** @var string */
	private $clientID = 'Enter valid clientID';

	/** @var string */
	private $lustrationId = '';

	public function setUp(): void
	{
		Environment::skip('this test should be run manually (don\'t forget to fill real clientID)');
	}

	public function testPreScore(): void
	{
		$client = (new PreScoringClientFactory($this->clientID))->create();
		$result = $client->preScore(PersonCreator::createMinimal());

		Assert::true($result->isPositive());
		Assert::false($result->hasBirthDay());
		Assert::false($result->hasNameDay());
		Assert::equal('', $result->getReason());
	}

	public function testLustWithMinimalPerson(): void
	{
		$client = (new LustrationClientFactory($this->clientID))->create();
		$result = $client->lust(PersonCreator::createMinimal());

		Assert::equal(32, strlen($result->getLustration()->getId()));
		$this->lustrationId = $result->getLustration()->getId();
	}

	public function testShare(): void
	{
		$client = (new ShareServiceClientFactory($this->clientID))->create();
		$result = $client->share($this->lustrationId, LoanStatus::APPLICATION, new Loan(3500, new DateTimeImmutable('2017-05-24')));

		Assert::equal($this->lustrationId, $result->getLustration()->getId());
		Assert::contains($result->getLustration()->getResult(), ResultEnum::VALID_RESULTS);
		Assert::contains($result->getShareData()->getResult(), ResultEnum::VALID_RESULTS);
		Assert::contains($result->getCertificate()->getResult(), Certificate::VALID_RESULTS);
	}

}

(new AllClientsTest())->run();
