<?php declare(strict_types = 1);

namespace Contributte\NRCZ\DI;

use Contributte\NRCZ\Client\LustrationClientFactory;
use Contributte\NRCZ\Client\PreScoringClientFactory;
use Contributte\NRCZ\Client\ShareServiceClientFactory;
use Nette\DI\CompilerExtension;

final class NRCZExtension extends CompilerExtension
{

	/** @var string[] */
	public $defaults = [
		'client_id' => 'testinput',
	];

	/**
	 * @inheritDoc
	 */
	public function loadConfiguration(): void
	{
		$config = $this->validateConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('client_factories.prescoring'))
			->setFactory(PreScoringClientFactory::class, [$config['client_id']]);

		$builder->addDefinition($this->prefix('client_factories.lustration'))
			->setFactory(LustrationClientFactory::class, [$config['client_id']]);

		$builder->addDefinition($this->prefix('client_factories.share_service'))
			->setFactory(ShareServiceClientFactory::class, [$config['client_id']]);
	}

}
