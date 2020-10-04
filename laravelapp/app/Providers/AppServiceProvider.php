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

        app()->when('App\MyClasses\MyService')
             ->needs('$id')
             ->give(1);
    }
}
