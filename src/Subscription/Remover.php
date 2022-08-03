<?php
namespace Try2Catch\WebPush\Subscription;

use Try2Catch\WebPush\Db\Subscription\Deleter;
use Exception;
use Log\Log;
use Try2Catch\WebPush\DtoMappingProvider;

class Remover
{
	public function __construct(
		private readonly Deleter $entityDeleter,
		private readonly DtoMappingProvider $dtoMappingProvider
	)
	{
	}

	public function remove(RemoveData $data): RemoveResult
	{
		$result = new RemoveResult();
		$result->setSuccess(false);

		try
		{
			$this->entityDeleter->delete(
				$this->dtoMappingProvider
					->getSubscriptionMapping()
					->getEntity($data->getSubscription())
			);

			$result->setSuccess(true);
		}
		catch (Exception $ex)
		{
			Log::error($ex);
		}

		return $result;
	}
}