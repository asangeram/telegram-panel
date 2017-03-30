<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Data\Models\User;

class LoginController extends Controller
{
    protected $Users;

    public function login()
    {
      return view('vendor.login');
    }


    public function postLogin(Request $request, User $user)
    {

        if(Sentinel::authenticate($request->all()));
            $user = Sentinel::getUser();
            try {

                  if ($user === null){
    
                    return redirect()->back()->with(['error' => "Adres email lub hasło są niepoprawne."])
                        ->withInput($request->input());   
                }                
                if($user->isAdmin() && $user->chat_id === null){
                    return view('vendor/telegramRegister', function($vm)use($user){
			
										/** 
										* @var $vm UserEditViewModel 
										*/

										$vm->User = $user;
									});
									
									}elseif( $user->isAdmin())
									{
                                        return redirect('/dashboard');
                                    }

                                if($user->isTeacher() && $user->chat_id === null){
                                    return view('vendor/telegramRegister');
									} elseif( $user->isTeacher())
									{
                                        return redirect('/teacher');
                                    }

                if($user->isStudent() && $user->chat_id === null){
										return $this->renderView('vendor/telegramRegister', function($vm)use($user){
			
										/** 
										* @var $vm UserEditViewModel 
										*/

										$vm->User = $user;
									});
									} elseif( $user->isStudent()) {return redirect("/profile/{$user->id}");
                }
                    
            } catch (Exception $ex) {
                }
                        
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }

    public function skipLogin(User $user)
    {
       $user = Sentinel::getUser(); 

       if($user->chat_id = null){
        DB::table('users')->insert(['chat_id' => 0]);
       }
       postLogin();
    }
}
