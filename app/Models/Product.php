<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array<int, \Illuminate\Database\Eloquent\Model> $models
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function newCollection(array $models = []): Collection
    {
        return new ProductCollectionHelper($models);
    }

    /**
     *  =============== RELATIONSHIPS  ===============.
     */

    /**
     *  =============== SCOPES  ===============.
     */
    public function scopeWithPrices(Builder $query, array $group_ids = [1])
    {
        $query->where('products.id', '>', 0);
    }
    /*
     *  =============== FUNCTIONS  ===============
     */
}
