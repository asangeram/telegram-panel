<?php

namespace Telegramapp\Telegram\AdminPanel;

/**
 * Class AdminLTE.
 */
class AdminLTE
{
    /**
     * Home controller copy path.
     *
     * @return array
     */
    public static function homeController()
    {
        return [
            __DIR__.'/stubs/HomeController.stub' => app_path('Http/Controllers/HomeController.php'),
        ];
    }

    /**
     * Auth register controller copy path.
     *
     * @return array
     */
    public static function registerController()
    {
        return [
            __DIR__.'/stubs/RegisterController.stub' =>
                app_path('Http/Controllers/Auth/RegisterController.php'),
        ];
    }

    /**
     * Auth login controller copy path.
     *
     * @return array
     */
    public static function loginController()
    {
        return [
            __DIR__.'/stubs/LoginController.stub' =>
                app_path('Http/Controllers/Auth/LoginController.php'),
        ];
    }

    /**
     * Auth forgot password controller copy path.
     *
     * @return array
     */
    public static function forgotPasswordController()
    {
        return [
            __DIR__.'/stubs/ForgotPasswordController.stub' =>
                app_path('Http/Controllers/Auth/ForgotPasswordController.php'),
        ];
    }

    /**
     * Auth reset password controller copy path.
     *
     * @return array
     */
    public static function resetPasswordController()
    {
        return [
            __DIR__.'/stubs/ResetPasswordController.stub' =>
                app_path('Http/Controllers/Auth/ResetPasswordController.php'),
        ];
    }

    /**
     * Public assets copy path.
     *
     * @return array
     */
    public static function publicAssets()
    {
        return [
            __DIR__.'/public/img'     => public_path('img'),
            __DIR__.'/public/css'     => public_path('css'),
            __DIR__.'/public/js'      => public_path('js'),
            __DIR__.'/public/plugins' => public_path('plugins'),
            __DIR__.'/public/fonts'   => public_path('fonts'),
        ];
    }

    /**
     * Only views to overwrite.
     *
     * @return array
     */
    public static function viewsToOverwrite()
    {
        return [
            __DIR__.'/resources/views/errors'            =>
                resource_path('views/errors'),
            __DIR__.'/resources/views/welcome.blade.php' =>
                resource_path('views/welcome.blade.php'),
            __DIR__.'/resources/views/layouts/partials/sidebar.blade.php' =>
                resource_path('views/vendor/adminlte/layouts/partials/sidebar.blade.php'),
        ];
    }

    /**
     * Path of sidebar.
     *
     * @return array
     */
    public static function sidebarView()
    {
        return [
            __DIR__.'/resources/views/layouts/partials/sidebar.blade.php' =>
                resource_path('views/vendor/adminlte/layouts/partials/sidebar.blade.php'),
        ];
    }

    /**
     * Views copy path.
     *
     * @return array
     */
    public static function views()
    {
        return [
            __DIR__.'/resources/views/adminlte/auth'              =>
                resource_path('views/vendor/adminlte/auth'),
            __DIR__.'/resources/views/adminlte/auth/emails'       =>
                resource_path('views/vendor/adminlte/auth/emails'),
            __DIR__.'/resources/views/adminlte/errors'            =>
                resource_path('views/vendor/adminlte/errors'),
            __DIR__.'/resources/views/adminlte/layouts'           =>
                resource_path('views/vendor/adminlte/layouts'),
            __DIR__.'/resources/views/welcome.blade.php' =>
                resource_path('views/welcome.blade.php'),
        ];
    }

    // /**
    //  * Tests copy path.
    //  *
    //  * @return array
    //  */
    // public static function tests()
    // {
    //     return [
    //         __DIR__.'/tests'       => base_path('tests'),
    //         __DIR__.'/phpunit.xml' => base_path('phpunit.xml'),
    //     ];
    // }

    // *
    //  * Resource assets copy path.
    //  *
    //  * @return array
     
    public static function resourceAssets()
    {
        return [
            __DIR__.'/resources/assets/less' => resource_path('assets/less'),
            __DIR__.'/resources/assets/sass' => resource_path('assets/sass'),
            __DIR__.'/resources/assets/js'   => resource_path('assets/js'),
            __DIR__.'/gulpfile.js'           => base_path('gulpfile.js'),
            __DIR__.'/package.json'          => base_path('package.json'),
        ];
    }

    // /**
    //  * Languages assets copy path.
    //  *
    //  * @return array
    //  */
    // public static function languages()
    // {
    //     return [
    //         __DIR__.'/resources/lang' => resource_path('lang/vendor/adminlte_lang'),
    //     ];
    // }

    /**
     * Gravatar path.
     *
     * @return array
     */
    public static function gravatar()
    {
        return [
            base_path().'/vendor/creativeorange/gravatar/config/gravatar.php' => config_path('gravatar.php'),
        ];
    }

    /**
     * Config path.
     *
     * @return array
     */
    public static function config()
    {
        return [
            __DIR__.'/config/adminlte.php' => config_path('adminlte.php'),
        ];
    }

    /**
     * Spatie menu path.
     *
     * @return array
     */
    public static function spatieMenu()
    {
        return [
            __DIR__.'/resources/views/layouts/partials/sidebar_with_spatie_menu.blade.php' =>
                resource_path('views/vendor/adminlte/layouts/partials/sidebar.blade.php')
        ];
    }

    /**
     * Menu path.
     *
     * @return array
     */
    public static function menu()
    {
        return [
            __DIR__.'/config/menu.php' =>
                config_path('menu.php')
        ];
    }

    /**
     * Web routes path.
     *
     * @return array
     */
    public static function webroutes()
    {
        return [
            __DIR__.'/routes/web.php' =>
                base_path('routes/web.php')
        ];
    }
 
    /**
     * Api routes path.
     *
     * @return array
     */
    public static function apiroutes()
    {
        return [
            __DIR__.'/routes/api.php' =>
                base_path('routes/api.php')
        ];
    }
}
