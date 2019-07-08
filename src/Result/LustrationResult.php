<?php declare(strict_types = 1);

namespace AsisTeam\NRCZ\Result;

use AsisTeam\NRCZ\Exception\Logical\InvalidArgumentException;
use AsisTeam\NRCZ\Result\Lustration\Cee;
use AsisTeam\NRCZ\Result\Lustration\Certificate;
use AsisTeam\NRCZ\Result\Lustration\CurrentCredit;
use AsisTeam\NRCZ\Result\Lustration\Lustration;
use AsisTeam\NRCZ\Result\Lustration\Person;
use AsisTeam\NRCZ\Result\Lustration\ShareData;
use AsisTeam\NRCZ\Result\Validator\ResultValidator;

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

	/** @var Cee|null */
	private $cee;

	/** @var Person|null */
	private $person;

	public function __construct(
		Lustration $lustration,
		ShareData $shareData,
		Certificate $certificate,
		CurrentCredit $credit,
		?Cee $cee = null,
		?Person $person = null
	)
	{
		$this->lustration = $lustration;
		$this->shareData = $shareData;
		$this->certificate = $certificate;
		$this->credit = $credit;
		$this->cee = $cee;
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

	public function getCee(): ?Cee
	{
		return $this->cee;
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

		ResultValidator::validate($data['lustration']['result']);

		$lustration = Lustration::fromArray($data['lustration']);

		$person = null;
		if (array_key_exists('person', $data)) {
			$person = Person::fromArray($data['person']);
		}
		$cee = null;
		if (array_key_exists('cee', $data)) {
			$cee = Cee::fromArray($data['cee']);
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
			$cee,
			$person
		);
	}

}
