<?php

namespace App\Http\Controllers;

use App\Data\Models\Pin;
use App\Data\Models\Map;
use App\Data\Models\Task;
use App\Data\Models\User;
use Telegramapp\Telegram\Laravel\ViewModels\DashboardViewModel;
use Telegramapp\Telegram\Laravel\ViewModels\UserEditViewModel;
use Illuminate\Validation\Rule;
use Sentinel;
use Validator;
use Illuminate\Http\Request;
use App\Data\Models\Groups;
use DB;


class TeacherController extends Controller
{

    public function dashboard(User $user)
    {
        // $groups = User::whereHas('groups', function ($query) {
        //     $query->where('slug', '=', 'teacher');
        // })->get();

   		return $this->renderView('admins.dashboard', function($vm) use($user){
            
            /** 
             * @var $vm DashboardViewModel 
             */
            $vm->User = $user;
            
        }, 'Dashboard');
    }

    public function getMaps(Map $map) {

        $map = Map::all();
        $pin = Pin::all();

    	return $this->renderView('teachers.maps', function($vm)use($map, $pin){
            
            /** 
             * @var $vm DashboardViewModel 
             */
            $vm->Map = $map;
            $vm->Pin = $pin;

        });

    }
    //     public function getPins(Pin $pin) {

    //     $pin = Pin::all();

    //     return $this->renderView('teachers.maps', function($vm)use($pin){
            
    //         /** 
    //          * @var $vm DashboardViewModel 
    //          */
    //         $vm->Pin = $pin;

    //     });

    // }
    public function addUsersToGroup(User $user, Groups $groups)
    {
        $user = User::all();
        $groups = Groups::all();

        return $this->renderView('teachers.addtogroup', function($vm)use($user, $groups){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $user;
            $vm->Group = $groups;
            
        });
    }
    public function postAddUsersToGroup(Request $request)
    {
       
        $groupNr = $request->get('group_nr');
        $userId = $request->get('user_id');
        // dd($userId);
        foreach($userId as $user){
        $group = DB::table('group_users')->insert(array('group_nr' => $groupNr, 'user_id' => $user));
        };
        

        return back();
    }

    public function getGroups(User $user, Groups $groups) 
    {
        

        $user = User::all();
        $groups = Groups::all();

    	return $this->renderView('teachers.groups', function($vm)use($user, $groups){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $user;
            $vm->Group = $groups;
            
        });

    }

    public function addGroup(Request $request, Groups $groups)
    {

        $validator = Validator::make($request->all(), [
            'Name' => 'required',

            ]);


        if ($validator->fails()) {

            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $id = Groups::create($request->all());


       	$groups = DB::table('groups')->get()->pluck(['id'])->last();
       
       	$groupNr = 'g' . $groups;
        

    	$group = DB::table('groups')->where('id', '=', $groups)->update(array('group_nr' => $groupNr));

        return back();
        
    }

    public function editGroup(Groups $groups)
    {
        return $this->renderView('teachers.editgroup', function($vm)use($groups){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->Group = $groups;

        });
    }

    public function updateGroup(Request $request, Groups $groups)
    {
                $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'GroupSlug' => [
                'required',
                // Rule::unique('groups')->ignore($groups->slug, 'group_slug'),
            ],
                
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput(); 
        } 
        
        $groups->update($request->all());

        return back();
    }
    
    

    public function getTasks(Task $task) {

    	return $this->renderView('teachers.tasks', function($vm)use($task){
            
            /** 
             * @var $vm UserEditViewModel 
             */
            $vm->User = $task;
        });
    }  

    public function getWords(User $user) {

        $user = User::all();
        $groups = Groups::all();

        return $this->renderView('teachers.words', function($vm)use($user, $groups){
        
            /** 
             * @var $vm UserEditViewModel  
             */
            $vm->Users = $user;
            $vm->Groups = $groups;
        
        
        }, 'Words');
    }
}  

    

