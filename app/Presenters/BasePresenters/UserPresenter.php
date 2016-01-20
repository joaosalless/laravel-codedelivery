<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class UserPresenter extends Presenter
{
    public function getRole()
    {
        switch ($this->role) {
            case 'client':
                $role = 'Cliente';
                break;

            case 'deliveryman':
                $role = 'Entregador';
                break;

            case 'admin':
                $role = 'Administrador';
                break;

            default:
                $role = '';
                break;
        }

        return $role;
    }

    public function getRoleClass()
    {
        switch ($this->role) {
            case 'client':
                $class = 'success';
                break;

            case 'deliveryman':
                $class = 'warning';
                break;

            case 'admin':
                $class = 'danger';
                break;

            default:
                $class = '';
                break;
        }

        return $class;
    }

    public function getQtdDeliverymanOrders()
    {
        return $this->deliverymanOrders ? $this->deliverymanOrders->count() : 0;
    }

    public function getTotalDeliverymanOrders($moeda = true, $currency = 'R$', $decimal = 2)
    {
        if ($this->deliverymanOrders) {
            return $moeda ? Utils::moeda($this->deliverymanOrders->sum('total'), $currency, $decimal) : $this->deliverymanOrders->sum('total');
        }
    }

    public function getImage($width = 250, $height = 250)
    {
        return "http://lorempixel.com/$width"."/"."$height/people/1";
    }
}
