<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;

class CategoryPresenter extends Presenter
{
    public function getQtdProducts()
    {
        return $this->products ? $this->products->count() : '';
    }

    public function getTotalValorProducts($moeda = true, $currency = 'R$', $decimal = 2)
    {
        if ($this->products) {
            return $moeda ? Utils::moeda($this->products->sum('price'), $currency, $decimal) : $this->products->sum('price');
        }
    }
}
