<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // if(!Collection::hasMacro('paginate')){
        //     Collection::macro('paginate',
        //         function ($perPage = 15, $page = null, $option = []) {
        //             $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        //             return (new LengthAwarePaginator(
        //                 $this->forPage($page, $perPage), $this->count(), $perPage, $page, $option))->withPath('');
        //         });
        // }
    }
}
