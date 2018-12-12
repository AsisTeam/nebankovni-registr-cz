<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Unit\Client;

use Contributte\NRCZ\Client\ShareServiceClient;
use Contributte\NRCZ\Entity\Loan;
use Contributte\NRCZ\Enum\LoanStatus;
use Contributte\NRCZ\Result\Lustration\Certificate;
use Contributte\NRCZ\Result\Lustration\ResultEnum;
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
	 * @throws Contributte\NRCZ\Exception\Runtime\ServiceNotAllowedException
	 */
	public function testShareResultError(): void
	{
		$soap = SoapMockHelper::createSoapMock('error_result.json');
		$client = new ShareServiceClient($soap, 'invalidClientId');
		$client->share('123', LoanStatus::NO_CHANGE, new Loan(0));
	}

}

(new ShareServiceClientTest())->run();
