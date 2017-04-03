# telegram-panel
Admin Panel Integrater with Telegram Communicator

Lines to put in your config/app.php

Providers: 

Telegramapp\Telegram\TelegramServiceProvider::class,
Telegramapp\Telegram\AdminPanel\Providers\AdminLTETemplateServiceProvider::class,
Cartalyst\Sentinel\Laravel\SentinelServiceProvider::class,

Aliases:

'Telegram'  => Telegramapp\Telegram\Laravel\Facades\Telegram::class,
'AdminLTE' => Telegramapp\Telegram\AdminPanel\Facades\AdminLTE::class,
'Activation' => Cartalyst\Sentinel\Laravel\Facades\Activation::class,
'Reminder'   => Cartalyst\Sentinel\Laravel\Facades\Reminder::class,
'Sentinel'   => Cartalyst\Sentinel\Laravel\Facades\Sentinel::class,

Now do 'php artisan vendor:publish --force'

We are using the "--force" attribute, because we are overriding app.js file to use AdminLTE

Now put these classes into you 'App\Http\Kernel.php' under $routeMiddleware:

'admin' => \App\Http\Middleware\AdminMiddleware::class,
'teacher' => \App\Http\Middleware\TeacherMiddleware::class,
'student' => \App\Http\Middleware\StudentsMiddleware::class,

