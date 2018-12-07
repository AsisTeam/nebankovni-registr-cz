<?php declare(strict_types = 1);

namespace Contributte\NRCZ\Client;

use Contributte\NRCZ\Entity\Person;
use Contributte\NRCZ\Result\PreScoringResult;

final class PreScoringClient extends AbstractSoapClient
{

	private const METHOD = 'plgSOAPnpre_scoring';

	public function preScore(Person $person): PreScoringResult
	{
		$data = $this->extractPerson($person);
		$data['client_id'] = $this->clientId;

		$result = $this->call(self::METHOD, $data);

		return PreScoringResult::fromArray($result);
	}

	/**
	 * @return string[]
	 */
	private function extractPerson(Person $p): array
	{
		$out = [
			'fname' => $p->getFirstName(),
			'sname' => $p->getLastName(),
			'person_id' => $p->getPersonalId(),
		];

		if ($p->getBankAccount() !== null) {
			$out['bank_account'] = $p->getBankAccount();
		}

		if ($p->getIdCardNumber() !== null) {
			$out['op'] = $p->getIdCardNumber();
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
