<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 13.06.2017
 * Time: 8:24
 */

require_once 'BaseController.php';
require_once 'models/Discount.php';

class OrderController extends BaseController
{
    protected $discount;

    public function __construct()
    {
        $this->discount = new Discount();
        parent::__construct();
    }

    protected function getContent()
    {
        $this->title = 'Оформление заказа';
        $this->meta_desc = 'Оформление заказа на покупку спиннера';
        $this->meta_key = 'заказ, оформление заказа, оформление заказа спиннер';

        return 'order';
    }

}