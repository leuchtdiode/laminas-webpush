<?php
declare(strict_types=1);

namespace Try2Catch\WebPush\Db\Notification\Filter;

use Common\Db\Filter\Equals;

class Error extends Equals
{
	protected function getField(): string
	{
		return 't.error';
	}
}