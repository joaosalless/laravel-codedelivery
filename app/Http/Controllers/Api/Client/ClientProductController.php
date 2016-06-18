<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\ProductRepository;

class ClientProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->skipPresenter(false)->paginate();

        return $products;
    }

    public function show($id)
    {
        return $this->productRepository
            ->skipPresenter(false)
            ->find($id);
    }
}
