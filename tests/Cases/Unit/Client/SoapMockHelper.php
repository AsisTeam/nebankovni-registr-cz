<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Tests\Cases\Unit\Client;

use Mockery;
use Mockery\MockInterface;
use SoapClient;

final class SoapMockHelper
{

	/**
	 * @return SoapClient|MockInterface
	 */
	public static function createSoapMock(string $file)
	{
		$result = file_get_contents(sprintf('%s/data/%s', __DIR__, $file));

		return Mockery::mock(SoapClient::class)->shouldReceive('__soapCall')->andReturn($result)->getMock();
	}

}
