<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 08.06.2017
 * Time: 0:12
 */
require_once 'modules_class.php';

class Content extends Modules
{
    protected $title = 'Интернет - магазин';
    protected $meta_desc = 'Интернет - магазин';
    protected $meta_key = 'Интернет - магазин';


    protected function getContent()
    {
        $this->template->set('msgHelloWorld', 'Привет! Я родился!');
        $this->template->set('products', $this->products->getAllProducts());
        return 'index';
    }

}