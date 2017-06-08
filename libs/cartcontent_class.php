<?php

/**
 * Created by PhpStorm.
 * User: kote
 * Date: 08.06.17
 * Time: 13:38
 */

require_once 'modules_class.php';

class Cartcontent extends Modules
{

    protected $title = 'Корзина';
    protected $meta_desc = 'Корзина';
    protected $meta_key = 'Корзина';


    protected function getContent()
    {
        $this->template->set('msgHelloWorld', 'Привет! Я родился!');
        return 'cart';
    }

}