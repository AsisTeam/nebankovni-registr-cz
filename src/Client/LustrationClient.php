<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use Contributte\NRCZ\Exception\Runtime\RequestException;
use Contributte\NRCZ\Exception\Runtime\ResponseException;
use Contributte\NRCZ\Result\LustrationResult;

final class LustrationClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnrnew_lust';

	public function lust(Person $person): LustrationResult
	{
		try {
			$result = $this->call(self::METHOD, $person);
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
