<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Client;

use SoapClient;

final class LustrationClientFactory
{

	private const WSDL = 'https://www.nebankovni-registr.cz/component/csoap/nrnew?wsdl';

	/** @var string */
	private $clientId;

	public function __construct(string $clientId)
	{
		$this->clientId = $clientId;
	}

	public function create(): LustrationClient
	{
		$soap = new SoapClient(
			self::WSDL,
			[
				'trace' => true,
			]
		);

		return new LustrationClient($soap, $this->clientId);
	}

}
