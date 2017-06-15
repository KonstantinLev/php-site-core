<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 15.06.2017
 * Time: 22:04
 */

require_once 'BaseModels.php';

class Order extends BaseModels
{
    public function __construct()
    {
        parent::__construct('orders');
    }

    protected function checkData($data)
    {
        if(!$this->check->oneOrZero($data['is_delivery'])) return 'ERROR_DELIVERY';
        if(!$this->check->ids($data['product_ids'])) return 'UNKNOWN_ERROR';
        if(!$this->check->amount($data['price'])) return 'UNKNOWN_ERROR';
        if(!$this->check->name($data['name'])) return 'ERROR_NAME';
        if(!$this->check->title($data['phone'])) return 'ERROR_PHONE';
        if(!$this->check->email($data['email'])) return 'ERROR_EMAIL';
        if($data['is_delivery'] == 1) $empty = true;
        else $empty = false;
        if(!$this->check->text($data['address'], $empty)) return 'ERROR_ADDRESS';
        if(!$this->check->text($data['notice'], true)) return 'ERROR_NOTICE';
        //if(!$this->check->ts($data['date_order'])) return 'UNKNOWN_ERROR';
        return true;
    }
}