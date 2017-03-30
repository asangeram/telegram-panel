<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
// use Mobile_Detect;
use App\Data\Models\BaseModel;
use App\Definitions\ResponseCode;
use App\Exceptions\IncorrectTaskContentException;
use App\Results\JsonResult;
use App\ViewModels\BaseViewModel;
use Sentinel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public $IsMobile;

    // public function __construct()
    // {
    //     $detect = new Mobile_Detect();
    //     $this->IsMobile = $detect->isMobile();
    // }

	protected function renderView($view, callable $callback, $viewmodel = null){

		$vm = new BaseViewModel();

		$vm->User = Sentinel::getUser();

		if($viewmodel instanceof BaseModel){
			$vm->Model = $viewmodel;
			$viewmodel = last(explode('\\', get_class($viewmodel)));
		}

		$className = 'Nordal\\ViewModels\\' . $viewmodel . 'ViewModel';
		if (class_exists($className)) {
			$vm = new $className;
		}

		if ($callback){
			$callback($vm);
		}

		return view($view)->with('ViewModel', $vm);
	}

	/*public function renderJsonResult(string $msg = '', callable $callback){

		$result = new JsonResult();
		$result->Status = ResponseCode::SUCCESS;
		$result->Message = $msg;
		try {
			if ($callback) {
				$callback($result);
			}
		} catch (IncorrectTaskContentException $ex){
			$result->Message = $ex->getMessage();
			$result->Status = ResponseCode::BADREQUEST;
		} catch (\Exception $ex){
			$result->Message = $ex->getMessage();
			$result->Status = ResponseCode::ERROR;
		}

		return response()->json($result);
	}*/
}
