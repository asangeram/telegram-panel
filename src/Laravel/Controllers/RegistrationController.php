<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\Models\Role;
use Sentinel;
use Validator;

class RegistrationController extends Controller
{
    public function register()
    {
			$uniqueToken = str_random(8);
      return view('vendor.register', compact('uniqueToken'));
    }
		

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required',
	        'Nickname' => 'required|unique:users,nickname',
	        'Email' => 'required|unique:users,email',
	        

	    ]);

	    if ($validator->fails()) {

	    	return redirect('/register')
	    	->withErrors($validator)
	    	->withInput();
	    }
	    $user = Sentinel::registerAndActivate($request->all());
	    /** @var Role $role */
	    $role = Sentinel::findRoleBySlug('student');
	    $role->users()->attach($user);
	    return redirect('/login');
    }
			
}
