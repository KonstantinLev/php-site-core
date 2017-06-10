<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 13:34
 */

require_once 'libs/global_class.php';

class Products extends GlobalClass
{
    public function __construct()
    {
        parent::__construct('products');
    }

    public function getAllProducts()
    {
        return $this->transform($this->getAll('date_add'));
    }

    protected function transformElement($data)
    {
        $data['path_img'] = $this->config->dir_img.$data['img'];
        return $data;
    }
}