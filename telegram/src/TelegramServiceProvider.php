<?php

namespace Telegramapp\Telegram;

use Telegram\Bot\Api;
use Telegram\Bot\BotsManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container as Application;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Foundation\Application as LaravelApplication;


/**
 * Class TelegramServiceProvider.
 */
class TelegramServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {

        // $this->package('AdminPanel/Providers', null, __DIR__);

        $this->setupConfig($this->app);
        
        $this->loadMigrationsFrom(__DIR__.'/Laravel/Migrations');
    //     $this->publishes([
    //     __DIR__.'/Laravel/Resources/views' => base_path('resources/views/vendor/telegramapp'),
    // ]);
        // $this->publishes([
        //     __DIR__.'/Laravel/Migrations/' => base_path('database/migrations/') ]);

        $this->publishes([
            __DIR__.'/Laravel/Models' => base_path('app/Data/Models')]);

        include __DIR__.'/Laravel/routes/web.php';

    }

    /**
     * Setup the config.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return void
     */
    protected function setupConfig(Application $app)
    {
        $source = __DIR__.'/Laravel/config/telegram.php';

        if ($app instanceof LaravelApplication && $app->runningInConsole()) {
            $this->publishes([$source => config_path('telegram.php')]);
        } elseif ($app instanceof LumenApplication) {
            $app->configure('telegram');
        }

        $this->mergeConfigFrom($source, 'telegram');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerManager($this->app);
        $this->registerBindings($this->app);
        $this->loadViewsFrom(__DIR__.'/Laravel/Resources/views', 'telegram');
        include __DIR__.'/Laravel/routes/web.php';
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\AdminController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\TeacherController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\StudentsController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\TelegramController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\DashboardController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\RegistrationController');
        $this->app->make('Telegramapp\Telegram\Laravel\Controllers\LoginController');

    }

    /**
     * Register the manager class.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return void
     */
    protected function registerManager(Application $app)
    {
        $app->singleton('telegram', function ($app) {
            $config = (array)$app['config']['telegram'];

            return (new BotsManager($config))->setContainer($app);
        });

        $app->alias('telegram', BotsManager::class);
    }

    /**
     * Register the bindings.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return void
     */
    protected function registerBindings(Application $app)
    {
        $app->bind('telegram.bot', function ($app) {
            $manager = $app['telegram'];

            return $manager->bot();
        });

        $app->alias('telegram.bot', Api::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['telegram', 'telegram.bot', BotsManager::class, Api::class];
    }


}


