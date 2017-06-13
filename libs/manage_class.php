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

    public function addCart($id = false)
    {
        if (!$id) $id = $this->request['id'];
        if (!$this->product->existsID($id)) return false;
        if ($_SESSION['cart']){
            $_SESSION['cart'] .= ','.$id;
        } else {
            $_SESSION['cart'] = $id;
        }
    }

    public function deleteCart()
    {
        $id = $this->request['id'];
        $ids = explode(',', $_SESSION['cart']);
        $_SESSION['cart'] = '';
        foreach($ids as $val){
            if($val != $id) $this->addCart($val);
        }
    }

    public function updateCart()
    {
        //print_r($this->request);
        $_SESSION['cart'] = '';
        foreach ($this->request as $key => $val){
            if (strpos($key, 'count_') !== false){
                $id = substr($key, strlen('count_'));
                for($i = 0; $i < $val; $i++){
                    $this->addCart($id);
                }
            }
        }
        $_SESSION['discount'] = $this->request['discount'];
    }
}