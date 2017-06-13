<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 13.06.2017
 * Time: 8:24
 */

require_once 'BaseController.php';
require_once 'models/Product.php';
require_once 'models/Discount.php';

class CartController extends BaseController
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
        $this->meta_key = mb_strtolower('заказ, оформление заказа, оформление заказа спиннер');

        return 'order';
    }

}