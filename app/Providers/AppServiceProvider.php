<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            /** @phpstan-ignore-next-line */
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $array = explode('.', $attribute);
                            $relationAttribute = end($array);
                            $array = array_diff($array, [$relationAttribute]);
                            $relationName = implode('.', $array);
                            // [$relationName, $relationAttribute] = explode('.', $attribute);
                            // \Log::info($relationName);
                            // \Log::info($relationAttribute);
                            // \Log::info($attribute);
                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%"); //@phpstan-ignore-line
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $attribute = $attribute == 'id' ? $query->getModel()->getTable() . '.id' : $attribute;
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });
    }
}
