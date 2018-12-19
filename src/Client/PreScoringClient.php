<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Client;

use AsisTeam\NRCZ\Entity\Person;
use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;
use AsisTeam\NRCZ\Exception\Runtime\RequestException;
use AsisTeam\NRCZ\Exception\Runtime\ResponseException;
use AsisTeam\NRCZ\Request\PreScoringRequest;
use AsisTeam\NRCZ\Result\PreScoringResult;
use SoapClient;

final class PreScoringClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnpre_scoring';

	/** @var PreScoringRequest */
	private $requestPreparer;

	public function __construct(SoapClient $client, string $clientId)
	{
		parent::__construct($client, $clientId);

		$this->requestPreparer = new PreScoringRequest();
	}

	public function preScore(Person $person): PreScoringResult
	{
		try {
			$data = $this->requestPreparer->prepareData($person);
			$result = $this->call(self::METHOD, $data);
		} catch (InvalidArgumentException $e) {
			throw new RequestException($e->getMessage(), $e->getCode(), $e);
		}

		try {
			return PreScoringResult::fromArray($result);
		} catch (InvalidArgumentException $e) {
			throw new ResponseException($e->getMessage(), $e->getCode(), $e);
		}
	}

}
