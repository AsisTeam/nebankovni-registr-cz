<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Entity;

final class Commitments
{

	/** @var int|null */
	private $banksDebt;

	/** @var int|null */
	private $nonBankProvidersDebt;

	/** @var int|null */
	private $executionsDebts;

	/** @var int|null */
	private $insolvenciesDebts;

	/** @var int|null */
	private $alimony;

	/** @var int|null */
	private $otherRegularDeductionFromWages;

	/** @var int|null */
	private $constandardLivingCosts;

	/** @var int|null */
	private $socialAndHealthInsuranceDebt;

	public function getBanksDebt(): ?int
	{
		return $this->banksDebt;
	}

	public function setBanksDebt(?int $banksDebt): void
	{
		$this->banksDebt = $banksDebt;
	}

	public function getNonBankProvidersDebt(): ?int
	{
		return $this->nonBankProvidersDebt;
	}

	public function setNonBankProvidersDebt(?int $nonBankProvidersDebt): void
	{
		$this->nonBankProvidersDebt = $nonBankProvidersDebt;
	}

	public function getExecutionsDebts(): ?int
	{
		return $this->executionsDebts;
	}

	public function setExecutionsDebts(?int $executionsDebts): void
	{
		$this->executionsDebts = $executionsDebts;
	}

	public function getInsolvenciesDebts(): ?int
	{
		return $this->insolvenciesDebts;
	}

	public function setInsolvenciesDebts(?int $insolvenciesDebts): void
	{
		$this->insolvenciesDebts = $insolvenciesDebts;
	}

	public function getAlimony(): ?int
	{
		return $this->alimony;
	}

	public function setAlimony(?int $alimony): void
	{
		$this->alimony = $alimony;
	}

	public function getOtherRegularDeductionFromWages(): ?int
	{
		return $this->otherRegularDeductionFromWages;
	}

	public function setOtherRegularDeductionFromWages(?int $otherRegularDeductionFromWages): void
	{
		$this->otherRegularDeductionFromWages = $otherRegularDeductionFromWages;
	}

	public function getConstandardLivingCosts(): ?int
	{
		return $this->constandardLivingCosts;
	}

	public function setConstandardLivingCosts(?int $constandardLivingCosts): void
	{
		$this->constandardLivingCosts = $constandardLivingCosts;
	}

	public function getSocialAndHealthInsuranceDebt(): ?int
	{
		return $this->socialAndHealthInsuranceDebt;
	}

	public function setSocialAndHealthInsuranceDebt(?int $socialAndHealthInsuranceDebt): void
	{
		$this->socialAndHealthInsuranceDebt = $socialAndHealthInsuranceDebt;
	}

}
