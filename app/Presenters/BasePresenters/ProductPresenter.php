<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;

class ProductPresenter extends Presenter
{
    public function getPrice($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->price, $currency, $decimal) : $this->price;
    }

    public function getQtdOrders()
    {
        return $this->orderItems ? $this->orderItems->sum('qtd') : '';
    }

    public function getTotalOrders($moeda = true, $currency = 'R$', $decimal = 2)
    {
        if ($this->orderItems) {
            return $moeda ? Utils::moeda($this->orderItems->sum('totals'), $currency, $decimal) : $this->orderItems->sum('totals');
        }
    }
}
