<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;
use Illuminate\Support\Str;

class ProductPresenter extends Presenter
{
    public function getName()
    {
        return Str::title($this->name);
    }
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

    // public function getImage($width = 800, $height = 800)
    // {
    //     return "http://placehold.it/$width"."x"."$height";
    // }

    public function getImage($width = 800, $height = 800)
    {
        return "http://lorempixel.com/$width"."/"."$height/food/" . rand(1, 9);
    }
}
