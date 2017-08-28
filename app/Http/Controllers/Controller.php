<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Route;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getControllerName()
	{
		return explode('.', Route::getCurrentRoute()->action['as'])[0];
	}

	public function getMethodName()
	{
		return explode('.', Route::getCurrentRoute()->action['as'])[1];
	}
}
