<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    function index()
    {
        $products = $this->productService->index();
        return view('product.index', compact('products'));
    }

    function show($id)
    {
        $product = $this->productService->show($id);
        return view('product.show', compact('product'));
    }
}
