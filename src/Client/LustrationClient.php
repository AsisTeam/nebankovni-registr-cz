<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Client;

use AsisTeam\NRCZ\Entity\Person;
use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;
use AsisTeam\NRCZ\Exception\Runtime\RequestException;
use AsisTeam\NRCZ\Exception\Runtime\ResponseException;
use AsisTeam\NRCZ\Request\LustrationRequest;
use AsisTeam\NRCZ\Result\LustrationResult;
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

	public function lust(Person $person, bool $forceActual = false): LustrationResult
	{
		try {
			$data = $this->requestPreparer->prepareData($person);
			$result = $this->call(self::METHOD, array_merge($data, ['ceex' => $forceActual ? 42 : 43]));
		} catch (InvalidArgumentException $e) {
			throw new RequestException($e->getMessage(), $e->getCode(), $e);
		}

		$tmp = \Tracy\Debugger::$maxDepth;
		\Tracy\Debugger::$maxDepth = 7;
		bdump($result, 'RAW');
		\Tracy\Debugger::$maxDepth = $tmp;

		try {
			return LustrationResult::fromArray($result);
		} catch (InvalidArgumentException $e) {
			throw new ResponseException($e->getMessage(), $e->getCode(), $e);
		}
	}

}
