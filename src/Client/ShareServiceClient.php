<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Client;

use AsisTeam\NRCZ\Entity\Loan;
use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;
use AsisTeam\NRCZ\Exception\Runtime\RequestException;
use AsisTeam\NRCZ\Exception\Runtime\ResponseException;
use AsisTeam\NRCZ\Request\ShareRequest;
use AsisTeam\NRCZ\Result\LustrationResult;
use SoapClient;

final class ShareServiceClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnrsh_share';

	/** @var ShareRequest */
	private $requestPreparer;

	public function __construct(SoapClient $client, string $clientId)
	{
		parent::__construct($client, $clientId);

		$this->requestPreparer = new ShareRequest();
	}

	public function share(string $lustrationId, string $status, Loan $loan): LustrationResult
	{
		try {
			$data = $this->requestPreparer->prepareData($lustrationId, $status, $loan);
			$result = $this->call(self::METHOD, $data);
		} catch (InvalidArgumentException $e) {
			throw new RequestException($e->getMessage(), $e->getCode(), $e);
		}

		try {
			return LustrationResult::fromArray($result);
		} catch (InvalidArgumentException $e) {
			throw new ResponseException($e->getMessage(), $e->getCode(), $e);
		}
	}

}
