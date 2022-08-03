<?php
namespace Try2Catch\WebPush\Subscription;

use Try2Catch\WebPush\Common\ResultTrait;

class SaveResult
{
	use ResultTrait;

	private ?Subscription $subscription = null;

	public function getSubscription(): ?Subscription
	{
		return $this->subscription;
	}

	public function setSubscription(?Subscription $subscription): void
	{
		$this->subscription = $subscription;
	}
}