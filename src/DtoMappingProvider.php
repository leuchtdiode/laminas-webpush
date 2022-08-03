<?php
declare(strict_types=1);

namespace Try2Catch\WebPush;

use Exception;
use Try2Catch\WebPush\Notification\Mapping as NotificationMapping;
use Try2Catch\WebPush\Subscription\Mapping as SubscriptionMapping;

/**
 * @method NotificationMapping getNotificationMapping()
 * @method SubscriptionMapping getSubscriptionMapping()
 */
class DtoMappingProvider
{
	public function __construct(
		private readonly NotificationMapping $notificationMapping,
		private readonly SubscriptionMapping $subscriptionMapping,
	)
	{
	}

	public function setUp(): void
	{
		$this->notificationMapping->setSubscriptionMapping($this->subscriptionMapping);
	}

	/**
	 * @throws Exception
	 */
	public function __call(string $name, array $arguments): mixed
	{
		if (str_starts_with($name, 'get'))
		{
			$property = lcfirst(
				substr($name, 3)
			);

			return $this->{$property};
		}

		throw new Exception('Could not handle method ' . $name);
	}
}