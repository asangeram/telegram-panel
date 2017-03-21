<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Telegramapp\Telegram\Laravel\Definitions\Roles;
use Sentinel;
use Telegramapp\Telegram\Laravel\Models\User;
use Illuminate\Http\Request;
use Telegramapp\Telegram\Laravel\ViewModels\UserEditViewModel;
use Validator;
use Illuminate\Validation\Rule;


class StudentsController extends Controller
{
    public function profile(User $user)
    {
        return $this->renderView('students.profile', function($vm)use($user){
			
			/** 
            * @var $vm UserEditViewModel 
            */

        	$vm->User = $user;
        });
    }

    public function editUser(Request $request, User $user) {

        $teachers = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'teacher');
        })->get();
        
        return $this->renderView('students.edituser', function($vm)use($user, $teachers){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $user;
            $vm->Teachers = $teachers;
            $vm->BackUrl = ("/profile/{{$user->id}}/");
        });
    }

    public function update(Request $request, User $user) {

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Nickname' => [
                'required',
                Rule::unique('users')->ignore($user->nickname, 'nickname'),
            ],
            'Email' => [
                'required',
                Rule::unique('users')->ignore($user->email, 'email'),
                ],            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput(); 
        } 
        
        $user->update($request->all());

        return back();
    }
}
