<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Services\OrderService;
use CodeDelivery\Presenters\Api\OrderPresenter;
use Authorizer;

class ClientCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    private $with = ['client', 'cupom', 'items', 'deliveryman'];

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
        $userId = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($userId)->client->id;
        $orders = $this->orderRepository
            ->with($this->with)
            ->skipPresenter(false)
            ->scopeQuery(function ($query) use ($clientId) {
                return $query->where('client_id', $clientId);
            })->paginate();

        return $orders;
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $userId = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($userId)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->orderService->create($data);
        $o = $this->orderRepository
            ->with($this->with)
            ->skipPresenter(false)
            ->find($o->id);

        return $o;
    }

    public function show($id)
    {
        return $this->orderRepository
            ->with($this->with)
            ->skipPresenter(false)
            ->find($id);
    }
}
