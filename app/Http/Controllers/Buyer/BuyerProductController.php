<?php

namespace APIRestfull\Http\Controllers\Buyer;

use APIRestfull\Buyer;
use Illuminate\Http\Request;
use APIRestfull\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        // Laravel Eloquent Eager Loading
        /**
         * Eager Loading es un concepto en el que
         * al recuperar elementos, obtiene todos los
         * elementos necesarios junto con todos (o la mayoría)
         * de los elementos relacionados al mismo tiempo.
         * Esto contrasta con la carga diferida en la que solo
         * obtiene un elemento de una vez y luego recupera elementos
         * relacionados solo cuando es necesario.
         **/
        $products = $buyer->transactions()->with('product')
                        ->get()
                        ->pluck('product');
        //dd($products);

        return $this->showAll($products);
    }
}
