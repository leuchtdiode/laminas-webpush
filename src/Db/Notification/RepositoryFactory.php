<?php
namespace Try2catch\WebPush\Db\Notification;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class RepositoryFactory implements FactoryInterface
{
	/**
	 * @throws ContainerExceptionInterface
	 * @throws NotFoundExceptionInterface
	 */
	public function __invoke(
		ContainerInterface $container,
		$requestedName,
		array $options = null
	): Repository
	{
		return $container
			->get(EntityManager::class)
			->getRepository(Entity::class);
	}
}