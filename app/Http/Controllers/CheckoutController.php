<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Services\OrderService;
use Auth;
use Flash;

class CheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    public function __construct(
        OrderRepository $orderRepository,
        OrderService $orderService,
        UserRepository $userRepository,
        ProductRepository $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderService = $orderService;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->scopeQuery(function ($query) {
            return $query->where('client_id', Auth::user()->client->id);
        })->paginate();

        return view('customer.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->productRepository->all();

        return view('customer.orders.create', compact('products'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->orderService->create($data);

        return redirect()->route('customer.orders.index');
    }

    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        return view('customer.orders.show', compact('order'));
    }
}
