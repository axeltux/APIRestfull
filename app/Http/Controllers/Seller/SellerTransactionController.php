<?php

namespace APIRestfull\Http\Controllers\Seller;

use APIRestfull\Seller;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $transactions = $seller->products()
                            ->whereHas('transactions')
                            ->with('transactions')
                            ->get()
                            ->pluck('transactions')
                            ->collapse();

        return $this->showAll($transactions);
    }
}
