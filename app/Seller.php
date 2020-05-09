<?php

namespace APIRestfull;

use APIRestfull\Product;
use APIRestfull\Scopes\SellerScope;

class Seller extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScope);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
