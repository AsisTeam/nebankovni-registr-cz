<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Entity;

final class Address
{

	/** @var string */
	private $street;

	/** @var string */
	private $city;

	/** @var string */
	private $postcode;

	/** @var string */
	private $streetNum;

	/** @var string */
	private $streetNumDesc;

	public function __construct(string $street, string $city, string $postcode, string $streetNum = '', string $streetNumDesc = '')
	{
		$this->street = $street;
		$this->city = $city;
		$this->postcode = $postcode;
		$this->streetNum = $streetNum;
		$this->streetNumDesc = $streetNumDesc;
	}

	public function getStreet(): string
	{
		return $this->street;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function getPostcode(): string
	{
		return $this->postcode;
	}

	public function getStreetNum(): string
	{
		return $this->streetNum;
	}

	public function getStreetNumDesc(): string
	{
		return $this->streetNumDesc;
	}

}
