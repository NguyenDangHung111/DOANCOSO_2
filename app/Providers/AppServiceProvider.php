<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $service = [
      'App\Services\Interfaces\AccountServiceInterface' => 'App\Services\AccountService',
      'App\Services\Interfaces\ProvinceServiceInterface' => 'App\Services\ProvinceService',
      'App\Services\Interfaces\DistrictServiceInterface' => 'App\Services\DistrictService',
      'App\Services\Interfaces\CategoryServiceInterface' => 'App\Services\CategoryService',
      'App\Services\Interfaces\ProductServiceInterface' => 'App\Services\ProductService',
      'App\Services\Interfaces\WardServiceInterface' => 'App\Services\WardService',
      'App\Services\Interfaces\Shop_cartServiceInterface' => 'App\Services\Shop_cartService',
      'App\Services\Interfaces\BillServiceInterface' => 'App\Services\BillService',

    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->service as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
