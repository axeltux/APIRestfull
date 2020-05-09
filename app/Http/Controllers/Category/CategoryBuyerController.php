<?php

namespace APIRestfull\Http\Controllers\Category;

use APIRestfull\Category;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class CategoryBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $buyers = $category->products()
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
