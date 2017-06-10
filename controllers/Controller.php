<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 08.06.2017
 * Time: 0:12
 */

require_once 'BaseController.php';

class Controller extends BaseController
{
    protected $title = 'Интернет - магазин';
    protected $meta_desc = 'Интернет - магазин';
    protected $meta_key = 'Интернет - магазин';

    public function __construct()
    {
        parent::__construct();
    }

    protected function getContent()
    {
        $this->linkSort();
        $sort = $this->getRequest('sort');
        $up = $this->getRequest('up');
        $this->template->set('msgHelloWorld', 'Привет! Я родился!');
        //$this->template->set('products', $this->product->getAllProducts());
        $this->template->set('products', $this->product->getAllSortProducts($sort, $up));
        return 'index';
    }

}