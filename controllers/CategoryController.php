<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 12.06.2017
 * Time: 23:24
 */

require_once 'BaseController.php';
require_once 'models/Product.php';

class CategoryController extends BaseController
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
        parent::__construct();
    }

    protected function getContent()
    {
        $this->linkSort();
        $sort = $this->getRequest('sort');
        $up = $this->getRequest('up');

        $category_info = $this->category->get($this->getRequest('id'));
        $this->title = $category_info['title'];
        $this->meta_desc = 'Спиннеры из раздела '.$category_info['title'];
        $this->meta_key = mb_strtolower('список спиннеров, спиннеры, спиннеры из категории '.$category_info['title']);

        $this->template->set('products', $this->product->getAllOnCategoryId($category_info['id'], $sort, $up));

        return 'category';
    }
}