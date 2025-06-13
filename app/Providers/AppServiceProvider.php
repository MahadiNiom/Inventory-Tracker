<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        function updateItem($item){
            $totalQuantity = 0;
            $totalValue = 0;

            foreach ($item->itemIns as $in) {
                if ($in->quantity > 0) {
                    $totalQuantity += $in->quantity;
                    $totalValue += $in->quantity * $in->price;
                }
            }

            if ($totalQuantity > 0) {
                $item->quantity = $totalQuantity;
                $item->price = $totalValue / $totalQuantity;
                $item->value = $totalValue;
                $item->save();
            }

        }
    }
    }
