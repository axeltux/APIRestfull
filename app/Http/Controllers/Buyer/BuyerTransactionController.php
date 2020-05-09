<?php

namespace APIRestfull\Http\Controllers\Buyer;

use APIRestfull\Buyer;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class BuyerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions;

        return $this->showAll($transactions);
    }
}
