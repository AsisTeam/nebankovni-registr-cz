<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use Contributte\NRCZ\Exception\Runtime\RequestException;
use Contributte\NRCZ\Exception\Runtime\ResponseException;
use Contributte\NRCZ\Request\LustrationRequest;
use Contributte\NRCZ\Result\LustrationResult;
use SoapClient;

final class LustrationClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnrnew_lust';

	/** @var LustrationRequest */
	private $requestPreparer;

	public function __construct(SoapClient $client, string $clientId)
	{
		parent::__construct($client, $clientId);

		$this->requestPreparer = new LustrationRequest();
	}

	public function lust(Person $person): LustrationResult
	{
		try {
			$data = $this->requestPreparer->prepareData($person);
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
