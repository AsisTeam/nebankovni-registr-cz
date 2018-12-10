<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Request;

use Contributte\NRCZ\Entity\Person;

interface IRequest
{

	/**
	 * @return mixed[]
	 */
	public function prepareData(Person $p): array;

}
