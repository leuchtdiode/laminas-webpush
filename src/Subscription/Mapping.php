<?php
namespace Try2Catch\WebPush\Subscription;

use Common\Db\Entity as DbEntity;
use Common\Db\EntityRepository;
use Common\Dto\CreateOptions as CommonCreateOptions;
use Common\Dto\Dto;
use Common\Dto\Mapping as CommonMapping;
use Try2Catch\WebPush\Db\Subscription\Entity;
use Try2Catch\WebPush\Db\Subscription\Repository;

/**
 * @method Entity getEntity(Dto $dto)
 */
class Mapping extends CommonMapping
{
	public function __construct(
		private readonly Repository $repository
	)
	{
	}

	/**
	 * @param Entity $entity
	 * @return Subscription
	 */
	public function createSingle(DbEntity $entity, ?CommonCreateOptions $createOptions = null): Dto
	{
		return new Subscription(
			$entity->getId(),
			$entity->getEndpoint(),
			$entity->getName(),
			$entity->getData(),
			$entity->getCreationDate()
		);
	}

	protected function getRepository(): EntityRepository
	{
		return $this->repository;
	}
}