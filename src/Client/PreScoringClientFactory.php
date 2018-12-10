<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use SoapClient;

final class PreScoringClientFactory
{

	private const WSDL = 'https://www.nebankovni-registr.cz/component/csoap/npre?wsdl';

	/** @var string */
	private $clientId;

	public function __construct(string $clientId)
	{
		$this->clientId = $clientId;
	}

	public function create(): PreScoringClient
	{
		$soap = new SoapClient(
			self::WSDL,
			[
				'trace' => true,
			]
		);

		return new PreScoringClient($soap, $this->clientId);
	}

}
