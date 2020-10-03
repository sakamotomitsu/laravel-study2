<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // NOTE: 一時的に前ページで値を変更したいならここで（開発中など）(コントローラーが呼ばれる前に実行される)
        config([
            'sample.data' => ['こんにちは', 'どうも', 'さようなら']
        ]);

        app()->bind('App\MyClasses\MyService',
                        function ($app) {
                            $myservice = new MyService();
                            $myservice->setId(0);
                            return $myservice;
                        });
    }
}
