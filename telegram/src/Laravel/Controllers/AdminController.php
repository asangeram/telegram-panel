<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Illuminate\Http\Request;
use Telegramapp\Telegram\Laravel\Models\User;
use Telegramapp\Telegram\Laravel\Models\Groups;
use Telegramapp\Telegram\Laravel\ViewModels\DashboardViewModel;
use Telegramapp\Telegram\Laravel\ViewModels\UserEditViewModel;
use Sentinel;
use Validator;
use Illuminate\Validation\Rule;
use Telegramapp\Telegram\Laravel\Controllers\TeacherController;
use Telegram\Bot\Laravel\Facades\Telegram;

class AdminController extends TeacherController
{
       
    public function getUsers(User $user) {

        $user = User::all();

        return $this->renderView('admins.users.users', function($vm)use($user){
            
            /** 
             * @var $vm EditUserViewModel 
             */
            $vm->Users = $user;
            
            
        }, 'Users');
    }
    
     public function getRoles() {
        return view('admins/users/roles');
    }
    
    public function userData(Request $request) {
        
        $data = User::all();

        return $this->renderView('admins.users.users', function($vm)use($data){
            
            /** 
             * @var $vm DashboardViewModel 
             */
            $vm->Users = $data;
            
            
        }, 'Dashboard');
    }
    
    public function editUser(User $user) {

         
        $teachers = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'teacher');
        })->get();
        return $this->renderView('students.edituser', function($vm)use($user, $teachers){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $user;
            $vm->Teachers = $teachers;
            $vm->BackUrl = ("/profile/{{$user->id}}");
        
        }, 'userEdit');
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
            'TeacherId' => 'required',    
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }                
	    //TODO sprawdzić czy można edytować użytkownika
        $user->update($request->all());

        return back();

    
}

    public function getMessage(User $user, Groups $groups)
    {
        return $this->renderView('students.sendmessage', function($vm)use($user, $groups){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $user;
            $vm->Groups = $groups;
        
        }, 'userEdit');

    } 
    
    public function postMessage(User $user, Request $request)
    {

        $chatId = $user->chat_id;

        $message = $request->get('message');

        $rules = [
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Message is required');

        }
        
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "$message",
            ]);
        

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Message sent');
    }


    public function delete(User $user) {
        
    	
    	//TODO sprawdzić czy można usunąć użytkownika
        $user->delete();
        
        return back();        
    }
    
 
}
