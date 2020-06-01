<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    function index()
    {
        return $this->product->all();
    }

    function show($id)
    {
        return $this->product->findOrFail($id);
    }

    function increaseView($id) {
        $product = $this->product->findOrFail($id);
        $product->view_count += 1;
        $product->save();
        return $product;
    }
}
