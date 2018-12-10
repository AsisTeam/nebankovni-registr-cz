<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Exception\Runtime\RequestException;
use SoapClient;
use SoapFault;

abstract class AbstractSoapClient
{

	/** @var SoapClient */
	protected $client;

	/** @var string */
	protected $clientId;

	public function __construct(SoapClient $client, string $clientId)
	{
		$this->client = $client;
		$this->clientId = $clientId;
	}

	/**
	 * @param mixed[]  $data
	 * @return mixed
	 */
	protected function call(string $method, array $data)
	{
		$data['client_id'] = $this->clientId;

		$json = json_encode($data);

		if ($json === false) {
			throw new RequestException(sprintf('Could not convert request input data to json. Error: %s', json_last_error_msg()));
		}

		try {
			$response = $this->client->__soapCall($method, [$json]);
		} catch (SoapFault $e) {
			throw new RequestException($e->getMessage(), 0, $e);
		}

		$result = json_decode($response, true);

		if ($result === null) {
			throw new RequestException(sprintf('Could not convert response output data from json. Error: %s', json_last_error_msg()));
		}

		return $result;
	}

}
