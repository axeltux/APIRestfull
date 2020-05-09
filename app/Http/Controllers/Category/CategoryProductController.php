<?php

namespace APIRestfull\Http\Controllers\Category;

use APIRestfull\Category;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;

        return $this->showAll($products);
    }
}
