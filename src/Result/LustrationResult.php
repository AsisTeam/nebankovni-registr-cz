<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Result;

use Contributte\NRCZ\Exception\Logical\InvalidArgumentException;
use Contributte\NRCZ\Result\Lustration\Certificate;
use Contributte\NRCZ\Result\Lustration\CurrentCredit;
use Contributte\NRCZ\Result\Lustration\Lustration;
use Contributte\NRCZ\Result\Lustration\Person;
use Contributte\NRCZ\Result\Lustration\ShareData;

final class LustrationResult
{

	/** @var Lustration */
	private $lustration;

	/** @var ShareData */
	private $shareData;

	/** @var Certificate */
	private $certificate;

	/** @var CurrentCredit */
	private $credit;

	/** @var Person|null */
	private $person;

	public function __construct(
		Lustration $lustration,
		ShareData $shareData,
		Certificate $certificate,
		CurrentCredit $credit,
		?Person $person = null
	)
	{
		$this->lustration = $lustration;
		$this->shareData = $shareData;
		$this->certificate = $certificate;
		$this->credit = $credit;
		$this->person = $person;
	}

	public function getLustration(): Lustration
	{
		return $this->lustration;
	}

	public function getShareData(): ShareData
	{
		return $this->shareData;
	}

	public function getCertificate(): Certificate
	{
		return $this->certificate;
	}

	public function getCredit(): CurrentCredit
	{
		return $this->credit;
	}

	public function getPerson(): ?Person
	{
		return $this->person;
	}

	/**
	 * @param mixed[] $data
	 */
	public static function fromArray(array $data): self
	{
		if (!array_key_exists('lustration', $data)) {
			throw new InvalidArgumentException('Lustration API response "lustration" field missing');
		}

		if (!array_key_exists('result', $data['lustration'])) {
			throw new InvalidArgumentException('Lustration API response lustration "result" field missing');
		}

		$lustration = Lustration::fromArray($data['lustration']);

		$person = null;
		if (array_key_exists('person', $data)) {
			$person = Person::fromArray($data['person']);
		}
		if (!array_key_exists('share_data', $data)) {
			throw new InvalidArgumentException('Lustration API response "share_data" field missing');
		}
		if (!array_key_exists('certificate', $data)) {
			throw new InvalidArgumentException('Lustration API response "certificate" field missing');
		}
		if (!array_key_exists('current_credit', $data)) {
			throw new InvalidArgumentException('Lustration API response "current_credit" field missing');
		}

		return new self(
			$lustration,
			ShareData::fromArray($data['share_data']),
			Certificate::fromArray($data['certificate']),
			CurrentCredit::fromArray($data['current_credit']),
			$person
		);
	}

}
