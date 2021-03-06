<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Artisan;
use Schema;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $alt_bg = '';

        if(!is_file(base_path('.env'))) {
            touch(base_path('.env'));
            Artisan::call('key:generate');
        }
        if(!is_file(database_path('app.sqlite'))) {
            // first time setup
            touch(database_path('app.sqlite'));
            Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true, '--seed' => true));
            Artisan::call('storage:link');
            //Cache
            //Artisan::call('config:cache');
            //Artisan::call('route:cache');
        }
        if(is_file(database_path('app.sqlite'))) {
            if(Schema::hasTable('settings')) {
                if($bg_image = Setting::fetch('background_image')) {
                    $alt_bg = ' style="background-image: url('.asset('storage/'.$bg_image).')"';
                }

                // check version to see if an upgrade is needed
                $db_version = Setting::fetch('version');
                $app_version = config('app.version');
                if(version_compare($app_version, $db_version) == 1) { // app is higher than db, so need to run migrations etc
                    Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true, '--seed' => true));                   
                }
            } else {
                Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true, '--seed' => true)); 
            }
        }
        view()->share('alt_bg', $alt_bg);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('settings', function () {
            return new Setting();
        });
    }
}
