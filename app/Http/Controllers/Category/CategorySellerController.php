<?php

namespace APIRestfull\Http\Controllers\Category;

use APIRestfull\Category;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
                            ->with('seller')
                            ->get()
                            ->pluck('seller')
                            ->unique('id')
                            ->values();

        return $this->showAll($sellers);
    }
}
