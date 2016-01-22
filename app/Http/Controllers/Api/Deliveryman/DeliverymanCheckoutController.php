<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use CodeDelivery\Presenters\Api\OrderPresenter;
use Authorizer;
use CodeDelivery\Models\Geo;
use CodeDelivery\Events\GetLocationDeliveryman;

class DeliverymanCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $orderService;

    private $orderWith = ['client', 'cupom', 'items'];

    public function __construct(
        OrderRepository $orderRepository,
        OrderService $orderService,
        UserRepository $userRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderService = $orderService;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $userDeliverymanId = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository
            ->with($this->orderWith)
            ->skipPresenter(false)
            ->scopeQuery(function ($query) use ($userDeliverymanId) {
                return $query->where('user_deliveryman_id', $userDeliverymanId);
            })->paginate();

        return $orders;
    }

    public function show($id)
    {
        $userDeliverymanId = Authorizer::getResourceOwnerId();
        return $this->orderRepository
            ->with($this->orderWith)
            ->skipPresenter(false)
            ->getByIdAndDeliveryman($id, $userDeliverymanId);
    }

    public function updateStatus(Request $request, $id)
    {
        $userDeliverymanId = Authorizer::getResourceOwnerId();
        return $this->orderService->updateStatus($id, $userDeliverymanId, $request->get('status'));
    }

    public function geo(Request $request, Geo $geo, $id)
    {
        $userDeliverymanId = Authorizer::getResourceOwnerId();
        $order = $this->orderRepository->getByIdAndDeliveryman($id, $userDeliverymanId);
        $geo->lat = $request->get('lat');
        $geo->long = $request->get('long');
        event(new GetLocationDeliveryman($geo, $order));
        return $geo;
    }
}
