<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*\Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
            'show' => 'mostrar'
        ]);*/
        \Validator::extend('max_uploaded_file_size', function ($attribute, $value, $parameters, $validator) {
            $total_size = array_reduce($value, function ( $sum, $item ) { 
                $sum += filesize($item->path()); 
                return $sum;
            });
            
            return $total_size < $parameters[0] * 1024; 

        });
        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        //setlocale(LC_TIME, config('app.locale'));
        setlocale(LC_ALL, 'es_MX.utf8');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
