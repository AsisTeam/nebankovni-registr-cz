<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use Contributte\NRCZ\Exception\Runtime\RequestException;
use Contributte\NRCZ\Exception\Runtime\ResponseException;
use Contributte\NRCZ\Result\PreScoringResult;

final class PreScoringClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnpre_scoring';

	public function preScore(Person $person): PreScoringResult
	{
		try {
			$result = $this->call(self::METHOD, $person);
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
