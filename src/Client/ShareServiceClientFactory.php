<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Client;

use SoapClient;

final class ShareServiceClientFactory
{

	private const WSDL = 'https://www.nebankovni-registr.cz/component/csoap/nrsh?wsdl';

	/** @var string */
	private $clientId;

	public function __construct(string $clientId)
	{
		$this->clientId = $clientId;
	}

	public function create(): ShareServiceClient
	{
		$soap = new SoapClient(
			self::WSDL,
			[
				'trace' => true,
			]
		);

		return new ShareServiceClient($soap, $this->clientId);
	}

}
