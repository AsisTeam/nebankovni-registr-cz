# Application

To be used for checking if person can apply for a loan or not.
It checks several endpoints of `nebankovni-registr.cz` and tries to get information about given person.
Then it return the risk level of loan for the person and several other data.

You must have your `clientID` provided by `analytics@decp.eu` to access the API, otherwise 'Service is not allowed for you.' exception will be thrown in all of services mentioned below.

## Content

- [PreScoring](#PreScoring)
- [Lustration](#Lustration)
- [SharedService](#SharedService)

---

## PreScoring

Checks person whether is allowed to get financial services offered. 
Pass a Person object to `PreScoringClient` service and get the `PreScoringResult` object.

Firstname, Lastname and PersonalID are mandatory fields fo person creation.
You may add more personal details for better results. 

### Usage

```php
use Contributte\NRCZ\Client\PreScoringClientFactory;
use Contributte\NRCZ\Entity\Person;

$client = (new PreScoringClientFactory('clientId'))->create();
$res = $client->preScore(new Person('605223/1234', 'Žofinka', 'Čížková'));

$res->getResult();
```

---

## Lustration

Performs financial lustration of given person. 
Pass a Person object to `LustrationClient` service and get the `LustrationResult` object.
`LustrationResult` among others provides `getLustration()->getResult()` method, which returns the result score (`A`/`B`/`C`/`D`/`Bez zaznamu`), `A` is the best, `D` is the worst.

Firstname, Lastname and PersonalID are mandatory fields fo person creation.
You may add more personal details for better results. Please see `Person` entity and other related entities for all optional fields. 

### Usage

```php
use Contributte\NRCZ\Client\LustrationClientFactory;
use Contributte\NRCZ\Entity\Person;

$client = (new LustrationClientFactory('clientId'))->create();
$res = $client->lust(new Person('605223/1234', 'Žofinka', 'Čížková'));

$res->getLustration()->getResult();
$res->getLustration()->getPerson();
$res->getLustration()->getShareData();
$res->getLustration()->getCertificate();
$res->getLustration()->getCredit();
```

---

## SharedService

Share service can be used for changing loan properties for given lustration identified by its id.
You may set new loan status, different loan amount or payment term by calling `share` method.

Service returns `LustrationResult` with current data. 

### Usage

```php
use Contributte\NRCZ\Client\LustrationClientFactory;
use Contributte\NRCZ\Entity\Person;

$client = (new ShareServiceClientFactory('clientId'))->create();
$res = $client->share(new Person('605223/1234', 'Žofinka', 'Čížková'));

// $res is LustrationResult object, but getPerson() is always null
// please see Lustration -> Usage
```
