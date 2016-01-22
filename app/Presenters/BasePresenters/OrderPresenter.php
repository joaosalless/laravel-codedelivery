<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class OrderPresenter extends Presenter
{
    public function getSubtotal($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->subtotal, $currency, $decimal) : $this->subtotal;
    }

    public function getTotal($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->total, $currency, $decimal) : $this->total;
    }

    public function getShippingCosts($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->shipping, $currency, $decimal) : $this->shipping;
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0:
                $status = 'Pendente';
                break;

            case 1:
                $status = 'A caminho';
                break;

            case 2:
                $status = 'Entregue';
                break;

            case 3:
                $status = 'Cancelado';
                break;

            default:
                $status = 'Pendente';
                break;
        }
        return $status;
    }
}
