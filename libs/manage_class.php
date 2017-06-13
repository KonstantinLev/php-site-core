<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 13.06.2017
 * Time: 5:10
 */

require_once 'config/config.php';
require_once 'format_class.php';
require_once 'models/Product.php';

class Manage
{
    private $config;
    private $format;

    public function __construct()
    {
        session_start();
        $this->config = new Config();
        $this->format = new Format();
        $this->product = new Product();
        $this->request = $this->format->xss($_REQUEST);

    }

    public function addCart()
    {
        $id = $this->request['id'];
        if (!$this->product->existsID($id)) return false;
        if ($_SESSION['cart']){
            $_SESSION['cart'] .= ','.$id;
        } else {
            $_SESSION['cart'] = $id;
        }
    }
}