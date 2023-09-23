<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\DI;

use Awaitcz\SmartForm\Client\AddressClient;
use Awaitcz\SmartForm\Client\CompanyClient;
use Awaitcz\SmartForm\Client\EmailClient;
use Awaitcz\SmartForm\Config;
use Awaitcz\SmartForm\Http\GuzzleClient;
use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use stdClass;

/** @method stdClass getConfig() */
final class SmartFormExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'clientId' => Expect::string()->required(),
			'testMode' => Expect::bool()->default(false),
			'token' => Expect::string()->required(),
		]);
	}

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig();

		// Config
		$builder
			->addDefinition($this->prefix('config'))
			->setFactory(Config::class, [
				$config->clientId,
				$config->token,
				$config->testMode,
			])
			->setAutowired(false);

		// Address client
		$builder
			->addDefinition($this->prefix('address'))
			->setFactory(AddressClient::class, [$this->prefix('@config')]);

		// Company client
		$builder
			->addDefinition($this->prefix('company'))
			->setFactory(CompanyClient::class, [$this->prefix('@config')]);

		// Email client
		$builder
			->addDefinition($this->prefix('email'))
			->setFactory(EmailClient::class, [$this->prefix('@config')]);

		// Http client
		$this->compiler->loadDefinitionsFromConfig([
			$this->prefix('httpClient') => $config->httpClient ?? GuzzleClient::class,
		]);
	}

}
