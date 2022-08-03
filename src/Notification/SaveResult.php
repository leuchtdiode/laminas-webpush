<?php
declare(strict_types=1);

namespace Try2Catch\WebPush\Notification;

use Try2Catch\WebPush\Common\ResultTrait;

class SaveResult
{
	use ResultTrait;

	private ?Notification $notification = null;

	public function getNotification(): ?Notification
	{
		return $this->notification;
	}

	public function setNotification(?Notification $notification): void
	{
		$this->notification = $notification;
	}
}