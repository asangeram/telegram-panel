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
Route::group(['middleware' => ['web']], function () {
Route::get('/', function () {
    return view('welcome');
});

    /* Teacher Routes */    

Route::group(['middleware' => 'teacher'], function () {
    
    Route::get('/teacher', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@dashboard');
    Route::get('/teacher/maps', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@getMaps');
    // Route::get('/teacher/maps', 'TeacherController@getPins');
    Route::get('/teacher/groups', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@getGroups');
    Route::get('/teacher/groups/addtogroup', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@addToGroup');
    Route::get('/teacher/groups/addtogroup', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@postAddToGroup');
    Route::post('/teacher/groups', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@addGroup');
    Route::get('/teacher/tasks', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@getTasks');
    Route::get('/teacher/words', '\Telegramapp\Telegram\Laravel\Controllers\TeacherController@getWords');

}); 

    /* Admin Route Group */

Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/dashboard', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@dashboard');   
    Route::get('/dashboard/users', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getUsers');   
    Route::get('/dashboard/users', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@userData');
    Route::get('/dashboard/users/{user}/delete', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@delete');
    /* Edit User Routes */   
    Route::get('/dashboard/users/{user}/edit', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@editUser');   
    Route::patch('/dashboard/users/{user}', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@update');
    /* Send Message To User Routes */
    Route::get('/dashboard/users/{user}/message', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getMessage'); 
    Route::post('/dashboard/users/{user}/send', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@postMessage'); 
    /* Edit Group */   
    Route::get('/dashboard/groups/{groups}/edit', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@editGroup');
    Route::patch('/dashboard/groups/{groups}', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@updateGroup');
    /* Get Existing Groups & Add New Group Routes */
    Route::get('/dashboard/groups', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getGroups');
    Route::post('/dashboard/groups', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@addGroup');
    /* Add Users To Group Routes */
    Route::get('/dashboard/groups/addtogroup', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@addUsersToGroup');
    Route::post('/dashboard/groups/addtogroup', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@postAddUsersToGroup');
   
    Route::get('/dashboard/roles', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getRoles');    
    Route::get('/dashboard/maps', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getMaps');
    // Route::get('/dashboard/maps', 'AdminController@getPins');
    Route::get('/dashboard/tasks', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getTasks');
    Route::get('/dashboard/words', '\Telegramapp\Telegram\Laravel\Controllers\AdminController@getWords');
        
});       
 

// Route::get('map/get', 'MapController@getMapName');
// Route::get('task/get/{taskId}', 'TaskController@getTask');

    /* Login & Register Routes */

Route::get('/register', '\Telegramapp\Telegram\Laravel\Controllers\RegistrationController@register');
Route::post('/register', '\Telegramapp\Telegram\Laravel\Controllers\RegistrationController@postRegister');

Route::get('/login', '\Telegramapp\Telegram\Laravel\Controllers\LoginController@login');
Route::post('/login', '\Telegramapp\Telegram\Laravel\Controllers\LoginController@postLogin');
Route::post('/skiplogin', '\Telegramapp\Telegram\Laravel\Controllers\LoginController@skipLogin');
Route::get('/telegramRegister', '\Telegramapp\Telegram\Laravel\Controllers\LoginController@postLogin');

Route::post('/logout', '\Telegramapp\Telegram\Laravel\Controllers\LoginController@logout');

    /* Students Routes */

Route::group(['middleware' => 'student'], function () {

    Route::get('/profile/{user}', '\Telegramapp\Telegram\Laravel\Controllers\StudentsController@profile');
    Route::get('/profile/{user}/edit', '\Telegramapp\Telegram\Laravel\Controllers\StudentsController@editUser');  
    Route::patch('/profile/{user}', '\Telegramapp\Telegram\Laravel\Controllers\StudentsController@update'); 
});


    /* Telegram Routes */
Route::get('/get-updates', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@getUpdates');
Route::get('/test', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@Test');
Route::get('/setwebhook', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@setWebhook');
Route::get('/deletewebhook', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@deleteWebhook');
Route::post('/348713440:AAGCWT2FoQ4Kg3HAHjkn9rdLKdNZiseT7CI/webhook', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@webhookUpdate'); 
Route::post('/send', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@postMessage');
Route::post('/send/group', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@postSendGroup');
Route::get('/getmembers', '\Telegramapp\Telegram\Laravel\Controllers\TelegramController@chatMembersCount');
});


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

