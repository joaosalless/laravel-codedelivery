<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;

class OrderItemPresenter extends Presenter
{
    public function getPrice($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->price, $currency, $decimal) : $this->price;
    }

    public function getTotals($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->totals, $currency, $decimal) : $this->totals;
    }
}
