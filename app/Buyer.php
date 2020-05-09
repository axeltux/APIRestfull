<?php

namespace APIRestfull;

use APIRestfull\Transaction;
use APIRestfull\Scopes\BuyerScope;

class Buyer extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerScope);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}