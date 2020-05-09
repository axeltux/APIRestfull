<?php

namespace APIRestfull\Http\Controllers\Buyer;

use APIRestfull\Buyer;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $categories = $buyer->transactions()->with('product.categories')
                        ->get()
                        ->pluck('product.categories')
                        ->collapse()
                        ->unique('id')
                        ->values();

        return $this->showAll($categories);
    }
}
