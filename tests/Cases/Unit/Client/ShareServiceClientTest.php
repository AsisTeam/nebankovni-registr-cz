<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Tests\Cases\Unit\Client;

use AsisTeam\NRCZ\Client\ShareServiceClient;
use AsisTeam\NRCZ\Entity\Loan;
use AsisTeam\NRCZ\Enum\LoanStatus;
use AsisTeam\NRCZ\Result\Lustration\Certificate;
use AsisTeam\NRCZ\Result\Lustration\ResultEnum;
use DateTimeImmutable;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../../../bootstrap.php';

class ShareServiceClientTest extends TestCase
{

	public function testShare(): void
	{
		$soap = SoapMockHelper::createSoapMock('share_service_result.json');
		$client = new ShareServiceClient($soap, 'clientId');

		$result = $client->share('93d50dae791c1be669a1ab9b0d156a68', LoanStatus::APPLICATION, new Loan(3500, new DateTimeImmutable('2017-05-24')));

		Assert::equal('93d50dae791c1be669a1ab9b0d156a68', $result->getLustration()->getId());
		Assert::contains($result->getLustration()->getResult(), ResultEnum::VALID_RESULTS);

		Assert::contains($result->getShareData()->getResult(), ResultEnum::VALID_RESULTS);
		Assert::equal(27, $result->getShareData()->getLoanApplications());

		Assert::contains($result->getCertificate()->getResult(), Certificate::NO);
		Assert::false($result->getCertificate()->hasCertificate());

		Assert::equal(257, $result->getCredit()->getNr());
		Assert::equal(214, $result->getCredit()->getCee());

		Assert::null($result->getPerson());
	}


	/**
	 * @throws AsisTeam\NRCZ\Exception\Runtime\ServiceNotAllowedException
	 */
	public function testShareResultError(): void
	{
		$soap = SoapMockHelper::createSoapMock('error_result.json');
		$client = new ShareServiceClient($soap, 'invalidClientId');
		$client->share('123', LoanStatus::NO_CHANGE, new Loan(0));
	}

}

(new ShareServiceClientTest())->run();
