<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 15:47
 */

require_once 'libs/CoreController.php';
require_once 'libs/url_class.php';
require_once 'models/Users.php';
require_once 'models/Product.php';
require_once 'models/Category.php';

abstract class BaseController extends CoreController
{
    protected $user;
    protected $product;
    protected $category;

    public function __construct()
    {
        parent::__construct();
        $this->user = new Users();
        $this->product = new Product();
        $this->category = new Category();

        $this->template->set('content', $this->getContent());
        $this->template->set('config', $this->config);
        $this->template->set('title', $this->title);
        $this->template->set('meta_desc', $this->meta_desc);
        $this->template->set('meta_key', $this->meta_key);
        $this->template->set('index', $this->url->index());
        $this->template->set('cart', $this->url->cart());
        $this->template->set('content', $this->getContent());
        $this->template->set('categories', $this->category->getAllCategories());

        $this->template->display('main');
    }

    protected function linkSort()
    {
        $this->template->set('linkPriceUp', $this->url->sortPriceUp());
        $this->template->set('linkPriceDown', $this->url->sortPriceDown());
        $this->template->set('linkTitleUp', $this->url->sortTitleUp());
        $this->template->set('linkTitleDown', $this->url->sortTitleDown());
    }
}