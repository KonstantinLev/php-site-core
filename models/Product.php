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

    public function getAllSortProducts($where, $sort, $up)
    {
        if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField($where));
        return $this->transform($this->getAllOnField($where, $sort, $up));
    }

    public function getAllOnCategoryId($where, $sort, $up)
    {
        if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField($where));
        return $this->transform($this->getAllOnField($where, $sort, $up));
    }

    public function getOthers($productInfo)
    {
        //$l = $this->getL($count, 0);
        $query = "SELECT * FROM `".$this->table_name."` WHERE `fid_category` = ".$this->config->sym_query." ORDER BY RAND()";
        return $this->transform($this->db->select($query, [$productInfo['fid_category']]));
    }

    protected function transformElement($data)
    {
        $data['path_img'] = $this->config->dir_img.$data['img'];
        $data['link'] = 'product?id='.$data['id'];
        $data['link_cart'] = 'functions.php?func=add_cart&id='.$data['id'];
        $data['short_desc'] = str_replace("\n", '<br>', $data['short_desc']);
        return $data;
    }

    public function get($id, $categoryTable)
    {
        if (!$this->check->id($id)) return false;
        $query = "SELECT `".$this->table_name."`.`id`,
        `".$this->table_name."`.`fid_category`,
        `".$this->table_name."`.`articul`,
        `".$this->table_name."`.`title`,
        `".$this->table_name."`.`short_desc`,
        `".$this->table_name."`.`price`,
        `".$this->table_name."`.`img`,
        `".$categoryTable."`.`title` as `category`
        FROM `".$this->table_name."`
        LEFT JOIN `".$categoryTable."` ON `".$categoryTable."`.`id` = `".$this->table_name."`.`fid_category`
        WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
        return $this->transform($this->db->selectRow($query, array($id)));
    }

    private function checkSortUp($sort, $up)
    {
        return ((($sort === 'title') || ($sort === 'price')) && (($up ==='1') || ($up === '0')));
    }
}