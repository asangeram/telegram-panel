<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    /* Teacher Routes */    

Route::group(['middleware' => 'teacher'], function () {
    
    Route::get('/teacher', 'TeacherController@dashboard');
    Route::get('/teacher/maps', 'TeacherController@getMaps');
    // Route::get('/teacher/maps', 'TeacherController@getPins');
    Route::get('/teacher/groups', 'TeacherController@getGroups');
    Route::get('/teacher/groups/addtogroup', 'TeacherController@addToGroup');
    Route::get('/teacher/groups/addtogroup', 'TeacherController@postAddToGroup');
    Route::post('/teacher/groups', 'TeacherController@addGroup');
    Route::get('/teacher/tasks', 'TeacherController@getTasks');
    Route::get('/teacher/words', 'TeacherController@getWords');

}); 

    /* Admin Route Group */

Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/dashboard', 'AdminController@dashboard');   
    Route::get('/dashboard/users', 'AdminController@getUsers');   
    Route::get('/dashboard/users', 'AdminController@userData');
    Route::get('/dashboard/users/{user}/delete', 'AdminController@delete');
    /* Edit User Routes */   
    Route::get('/dashboard/users/{user}/edit', 'AdminController@editUser');   
    Route::patch('/dashboard/users/{user}', 'AdminController@update');
    /* Send Message To User Routes */
    Route::get('/dashboard/users/{user}/message', 'AdminController@getMessage'); 
    Route::post('/dashboard/users/{user}/send', 'AdminController@postMessage'); 
    /* Edit Group */   
    Route::get('/dashboard/groups/{groups}/edit', 'AdminController@editGroup');
    Route::patch('/dashboard/groups/{groups}', 'AdminController@updateGroup');
    /* Get Existing Groups & Add New Group Routes */
    Route::get('/dashboard/groups', 'AdminController@getGroups');
    Route::post('/dashboard/groups', 'AdminController@addGroup');
    /* Add Users To Group Routes */
    Route::get('/dashboard/groups/addtogroup', 'AdminController@addUsersToGroup');
    Route::post('/dashboard/groups/addtogroup', 'AdminController@postAddUsersToGroup');
   
    Route::get('/dashboard/roles', 'AdminController@getRoles');    
    Route::get('/dashboard/maps', 'AdminController@getMaps');
    // Route::get('/dashboard/maps', 'AdminController@getPins');
    Route::get('/dashboard/tasks', 'AdminController@getTasks');
    Route::get('/dashboard/words', 'AdminController@getWords');
        
});       
 

// Route::get('map/get', 'MapController@getMapName');
// Route::get('task/get/{taskId}', 'TaskController@getTask');

    /* Login & Register Routes */
Route::group(['middleware' => ['web']], function () {
Route::get('/register', 'RegistrationController@register');
Route::post('/register', 'RegistrationController@postRegister');

Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@postLogin');
Route::get('/telegramRegister', 'LoginController@postLogin');

Route::post('/logout', 'LoginController@logout');
});
    /* Students Routes */

Route::group(['middleware' => 'student'], function () {

    Route::get('/profile/{user}', 'StudentsController@profile');
    Route::get('/profile/{user}/edit', 'StudentsController@editUser');  
    Route::patch('/profile/{user}', 'StudentsController@update'); 
});


    /* Telegram Routes */
Route::get('/get-updates', 'TelegramController@getUpdates');
Route::get('/test', 'TelegramController@Test');
Route::get('/setwebhook', 'TelegramController@setWebhook');
Route::get('/deletewebhook', 'TelegramController@deleteWebhook');
Route::post('/348713440:AAGCWT2FoQ4Kg3HAHjkn9rdLKdNZiseT7CI/webhook', 'TelegramController@webhookUpdate'); 
Route::post('/send', 'TelegramController@postMessage');
Route::post('/send/group', 'TelegramController@postSendGroup');
Route::get('/getmembers', 'TelegramController@chatMembersCount');



    /* Game Routes */

// Route::get('map/get', 'MapController@getMapName');
// Route::get('task/get/{taskId}', 'TaskController@getTask');

// Route::get('/chapter4', function () {
// 	//$chap = $this->app->make(Nordal\Data\Models\Chapter::class);
// 	$chapter = \Nordal\Data\Models\Chapter::find(4);
// 	foreach($chapter->Tasks as $task)
// 		dd($task->type->name);
// });

// Route::get('/item4', function () {
// 	//$chap = $this->app->make(Nordal\Data\Models\Chapter::class);
// 	$item = \Nordal\Data\Models\Item::find(4);
// 	dd($item->type->name);
// });
// Route::get('/task13', function () {
// 	//$chap = $this->app->make(Nordal\Data\Models\Chapter::class);
// 	$task = \Nordal\Data\Models\Task::find(13);
// 	dd($task->Chapter->Name);
// });
// Route::get('/map3', function () {
// 	//$chap = $this->app->make(Nordal\Data\Models\Chapter::class);
// 	$map = $this->app->make(Nordal\Domain\Services\MapService::class);
// 	dd($map->GetMap());
// });

