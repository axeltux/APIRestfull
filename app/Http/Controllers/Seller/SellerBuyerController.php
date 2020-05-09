<?php

namespace APIRestfull\Http\Controllers\Seller;

use APIRestfull\Seller;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class SellerBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $buyers = $seller->products()
                        ->whereHas('transactions')
                        ->with('transactions.buyer')
                        ->get()
                        ->pluck('transactions')
                        ->collapse()
                        ->pluck('buyer')
                        ->unique('id')
                        ->values();

        return $this->showAll($buyers);

    }
}
