<?php

namespace APIRestfull\Http\Controllers\Transaction;

use APIRestfull\Transaction;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class TransactionSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
