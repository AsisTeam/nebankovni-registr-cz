<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use Contributte\NRCZ\Exception\Runtime\RequestException;
use Contributte\NRCZ\Exception\Runtime\ResponseException;
use Contributte\NRCZ\Request\PreScoringRequest;
use Contributte\NRCZ\Result\PreScoringResult;
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
