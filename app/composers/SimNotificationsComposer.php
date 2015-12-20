<?php
namespace App\Composers;

class SimNotificationsComposers
{
	public function compose($view)
	{
		$view->with('$count', 11);
	}
}

