<?php

namespace CodeDelivery\Services;

use CodeDelivery\Models\Order;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\UserRepository;
use DB;
use Carbon\Carbon;

class OrderService
{
    private $clientRepository;
    private $productRepository;
    private $orderRepository;
    private $cupomRepository;
    private $userRepository;

    public function __construct(
        ClientRepository $clientRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        CupomRepository $cupomRepository,
        UserRepository $userRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $data['status'] = 0;

            if (isset($data['cupom_id'])) {
                $data['cupom_id'];
            }

            if (isset($data['cupom_code']) && $data['cupom_code'] <> '') {
                $cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
                $cupom->used = 1;
                $cupom->used_at = new Carbon();
                $cupom->save();
                unset($data['cupom_code']);
            }

            $items = $data['items'];
            unset($data['items']);

            $order = $this->orderRepository->create($data);
            $total = 0;

            foreach ($items as $item) {
                $item['price'] = $this->productRepository->find($item['product_id'])->price;
                $order->items()->create($item);
                $total += $item['price'] * $item['qtd'];
            }

            $order->total = $total;
            if (isset($cupom)) {
                $order->total = $total - $cupom->value;
            }

            $order->save();
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        return $order;
    }

    public function updateStatus($id, $userDeliverymanId, $status)
    {
        $order = $this->orderRepository->getByIdAndDeliveryman($id, $userDeliverymanId);
        if ($order instanceof Order) {
            $order->status = $status;
            if ((int)($order->status) == 1 && !$order->hash) {
                $order->hash = md5((new \DateTime())->getTimestamp());
            }
            $order->save();
            return $order;
        }

        return false;
    }
}
