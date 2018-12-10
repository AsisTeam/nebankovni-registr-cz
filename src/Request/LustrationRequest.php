<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Request;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Utils\Formatter;

final class LustrationRequest implements IRequest
{

	private const DATE_FORMAT = 'Y-m-d';

	/**
	 * @return mixed[]
	 */
	public function prepareData(Person $p): array
	{
		// Mandatory items
		$out = [
			'fname' => $p->getFirstName(),
			'sname' => $p->getLastName(),
			'person_id' => $p->getPersonalId(),
		];

		// Optional items follows

		if ($p->getBankAccount() !== null) {
			$out['bank_account'] = $p->getBankAccount();
		}

		if (count($p->getPhones()) > 0) {
			$out['phone'] = $p->getPhones()[0] ?? '';
			$out['phone2'] = $p->getPhones()[1] ?? '';
		}

		if (count($p->getEmails()) > 0) {
			$out['email'] = $p->getEmails()[0] ?? '';
			$out['email2'] = $p->getEmails()[1] ?? '';
		}

		if (count($p->getIpAddresses()) > 0) {
			$out['IP'] = $p->getIpAddresses()[0] ?? '';
			$out['IP2'] = $p->getIpAddresses()[1] ?? '';
		}

		if ($p->getMaritalStatus() !== null) {
			$out['marital_status'] = $p->getMaritalStatus();
		}

		if ($p->getEducation() !== null) {
			$out['highest_degree'] = $p->getEducation();
		}

		if ($p->getChildren() !== null) {
			$out['num_children'] = $p->getChildren();
		}

		if ($p->getAddress() !== null) {
			$out['street'] = $p->getAddress()->getStreet();
			$out['street_num'] = $p->getAddress()->getStreetNum();
			$out['street_num_desc'] = $p->getAddress()->getStreetNumDesc();
			$out['city'] = $p->getAddress()->getCity();
			$out['zip_code'] = $p->getAddress()->getPostcode();
		}

		if ($p->getDeliveryAddress() !== null) {
			$out['delivery_street'] = $p->getDeliveryAddress()->getStreet();
			$out['delivery_street_num'] = $p->getDeliveryAddress()->getStreetNum();
			$out['delivery_street_num_desc'] = $p->getDeliveryAddress()->getStreetNumDesc();
			$out['delivery_city'] = $p->getDeliveryAddress()->getCity();
			$out['delivery_zip_code'] = $p->getDeliveryAddress()->getPostcode();
		}

		if ($p->getIdentityCard() !== null) {
			$out['card_id'] = $p->getIdentityCard()->getId();
			$out['card_validity'] = $p->getIdentityCard()->getValidity() !== null ? $p->getIdentityCard()->getValidity()->format(self::DATE_FORMAT) : '';
		}

		if ($p->getPassport() !== null) {
			$out['passport_id'] = $p->getPassport()->getId();
			$out['passport_validity'] = $p->getPassport()->getValidity() !== null ? $p->getPassport()->getValidity()->format(self::DATE_FORMAT) : '';
		}

		if ($p->getDriverLicense() !== null) {
			$out['drivers_license_num'] = $p->getDriverLicense()->getId();
		}

		if ($p->getLoan() !== null) {
			$out['loan_amount'] = $p->getLoan()->getAmount();
			$out['loan_due_day'] = $p->getLoan()->getDueDate()->format(self::DATE_FORMAT);
			$out['loan_monthly_payment'] = $p->getLoan()->getMonthlyPayment();
			$out['loan_number_payments'] = $p->getLoan()->getPaymentsCount();
		}

		if ($p->getOwnership() !== null) {
			$out['immovable_property'] = Formatter::boolToStr($p->getOwnership()->hasImmovableProperty());
			$out['car'] = Formatter::boolToStr($p->getOwnership()->hasCar());
		}

		if ($p->getEmployment() !== null) {
			$out['type_of_employment'] = $p->getEmployment()->getType();
			$out['start_of_employment'] = $p->getEmployment()->getStart()->format(self::DATE_FORMAT);
			$out['end_of_employment'] = $p->getEmployment()->getEnd() !== null ? $p->getEmployment()->getEnd()->format(self::DATE_FORMAT) : '';

			$out['profession'] = $p->getEmployment()->getProfession();
			$out['entrepreneurship'] = $p->getEmployment()->getEntrepreneurship();
			$out['employer_name'] = $p->getEmployment()->getEmployerName();
			$out['employer_id'] = $p->getEmployment()->getEmployerId();
			$out['employer_phone'] = $p->getEmployment()->getEmployerPhone();
		}

		if ($p->getIncome() !== null) {
			$out['net_monthly_income'] = $p->getIncome()->getNetMonthlyIncome();
			$out['income_family_members'] = $p->getIncome()->getIncomeFamilyMembers() ?? '';
		}

		if ($p->getCommitments() !== null) {
			$out['bank_debt'] = $p->getCommitments()->getBanksDebt() ?? '';
			$out['debt_non_bank_providers'] = $p->getCommitments()->getNonBankProvidersDebt() ?? '';

			$out['total_debt_for_execution'] = $p->getCommitments()->getExecutionsDebts() ?? '';
			$out['debt_insolvencies'] = $p->getCommitments()->getInsolvenciesDebts() ?? '';
			$out['alimony'] = $p->getCommitments()->getAlimony() ?? '';
			$out['other_regular_deduction_from_wages'] = $p->getCommitments()->getOtherRegularDeductionFromWages() ?? '';
			$out['constandard_living_costs'] = $p->getCommitments()->getConstandardLivingCosts() ?? '';
			$out['debt_tax_social_health_insurance'] = $p->getCommitments()->getSocialAndHealthInsuranceDebt() ?? '';
		}

		return $out;
	}

}
