<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use Flash;

class OrdersController extends Controller
{
    private $orderRepository;
    private $userRepository;

    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        Flash::warning('Não é permitido criar pedidos através da área administrativa.');
        return redirect()->back();
    }

    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        $listsDeliveryman = $this->userRepository->listsDeliveryman();

        $listsStatus = $this->orderRepository->listsStatus();

        return view('admin.orders.edit', compact('order', 'listsDeliveryman', 'listsStatus'));
    }

    public function update(AdminOrderRequest $request, $id)
    {
        $data = $request->all();
        $this->orderRepository->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (!$order->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->orderRepository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.orders.index');
    }
}
