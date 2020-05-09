<?php

namespace APIRestfull\Http\Controllers\Buyer;

use APIRestfull\Buyer;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()->with('product.seller')
                        ->get()
                        ->pluck('product.seller')
                        ->unique('id')
                        ->values();

        return $this->showAll($sellers);
    }
}
