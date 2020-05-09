<?php

namespace APIRestfull\Http\Controllers\Seller;

use APIRestfull\Seller;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
                            ->with('categories')
                            ->get()
                            ->pluck('categories')
                            ->collapse()
                            ->unique('id')
                            ->values();

        return $this->showAll($categories);
    }
}
