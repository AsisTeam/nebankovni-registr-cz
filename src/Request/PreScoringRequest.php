<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Request;

use Contributte\NRCZ\Entity\Person;

final class PreScoringRequest
{

	/**
	 * @return mixed[]
	 */
	public function prepareData(Person $p): array
	{
		// mandatory fields
		$out = [
			'fname' => $p->getFirstName(),
			'sname' => $p->getLastName(),
			'person_id' => $p->getPersonalId(),
		];

		// optional fields follows

		if ($p->getBankAccount() !== null) {
			$out['bank_account'] = $p->getBankAccount();
		}

		if ($p->getIdentityCard() !== null) {
			$out['op'] = $p->getIdentityCard()->getId();
		}

		if (count($p->getPhones()) > 0) {
			$out['phone'] = $p->getPhones()[0];
		}

		if (count($p->getEmails()) > 0) {
			$out['email'] = $p->getEmails()[0];
		}

		return $out;
	}

}
