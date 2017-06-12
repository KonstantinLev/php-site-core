<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 13:34
 */

require_once 'BaseModels.php';

class Product extends BaseModels
{
    public function __construct()
    {
        parent::__construct('products');
    }

    public function getAllProducts()
    {
        return $this->transform($this->getAll('date_add', false));
    }

    public function getTopNewProducts($count)
    {
        return $this->transform($this->getAll('date_add', false, $count));
    }

    public function getAllSortProducts($sort, $up)
    {
        if (!$this->checkSortUp($sort, $up)) return $this->getAllProducts();
        return $this->transform($this->getAll($sort, $up));
    }

    public function getAllOnCategoryId($id, $sort, $up)
    {
        if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField('id', $id));
        return $this->transform($this->getAllOnField('id', $id, $sort, $up));
    }


    protected function transformElement($data)
    {
        $data['path_img'] = $this->config->dir_img.$data['img'];
        return $data;
    }

    private function checkSortUp($sort, $up)
    {
        return ((($sort === 'title') || ($sort === 'price')) && (($up ==='1') || ($up === '0')));
    }
}