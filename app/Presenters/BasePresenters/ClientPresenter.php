<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class ClientPresenter extends Presenter
{
    public function getEmail()
    {
        return $this->user->email;
    }

    public function getPhone()
    {
        return Utils::mask($this->phone, Mask::TELEFONE);
    }

    public function getZipcode()
    {
        return Utils::mask($this->zipcode, Mask::CEP);
    }

    public function getQtdOrders()
    {
        return $this->orders ? $this->orders->count() : $this->orders;
    }

    public function getTotalOrders($moeda = true, $currency = 'R$', $decimal = 2)
    {
        if ($this->orders) {
            return $moeda ? Utils::moeda($this->orders->sum('total'), $currency, $decimal) : $this->orders->sum('total');
        }
    }
}
