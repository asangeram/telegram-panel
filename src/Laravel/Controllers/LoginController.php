<?php

namespace Telegramapp\Telegram\Laravel\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Data\Models\User;
use DB;

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
    
    public function skipTelegramLogin(User $user)
    {
        $users = Sentinel::getUser();
        
        $chat_id = $users->chat_id;
        
        $email = $users->email;
        
        if($chat_id === null){
            $table = DB::table('users')->update(['chat_id' => 0]);
        }
        
        // dd($chat_id);
        return back();
    }
}
