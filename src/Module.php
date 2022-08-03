<?php
namespace Try2Catch\WebPush;

use Laminas\Mvc\MvcEvent;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Module
{
	public function getConfig(): array
	{
		return include __DIR__ . '/../config/module.config.php';
	}

	/**
	 * @throws ContainerExceptionInterface
	 * @throws NotFoundExceptionInterface
	 */
	public function onBootstrap(MvcEvent $e): void
	{
		$application    = $e->getApplication();
		$serviceManager = $application->getServiceManager();

		/**
		 * @var DtoMappingProvider $dtoMappingProvider
		 */
		$dtoMappingProvider = $serviceManager->get(DtoMappingProvider::class);
		$dtoMappingProvider->setUp();
	}
}