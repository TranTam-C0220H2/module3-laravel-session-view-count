<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    function index() {
        return $this->productRepository->index();
    }

    function show($id) {
        if (session('productKey'.$id)) {
            return $this->productRepository->show($id);
        }
        session()->push('productKey'.$id, true);
        return $this->productRepository->increaseView($id);
    }
}
