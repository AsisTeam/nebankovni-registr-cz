# Application

## Content

- [PreScoring](#preScoring)

## PreScoring

Checks person whether is allowed to get financial services offered. 
Pass a Person object to `PreScoringClient` service and get the `PreScoringResult` object.

You must have your `clientID` provided by analytics@decp.eu to access the API, otherwise 'Service is not allowed for you.' exception will be thrown.

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

## Lustration

Performs financial lustration of given person. 
Pass a Person object to `LustrationClient` service and get the `LustrationResult` object.

You must have your `clientID` provided by analytics@decp.eu to access the API, otherwise 'Service is not allowed for you.' exception will be thrown.

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
