<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 08.06.2017
 * Time: 0:12
 */

require_once 'config/config.php';
require_once 'url_class.php';
require_once 'format_class.php';
require_once 'template_class.php';
require_once 'models/Users.php';
require_once 'models/Products.php';
require_once 'models/Categorys.php';

abstract class Modules
{
    protected $config;
    protected $data;
    protected $url;
    protected $format;
    protected $template;

    public function __construct()
    {
        session_start();
        $this->config = new Config();
        $this->url = new Url();
        $this->format = new Format();
        $this->data = $this->format->xss($_REQUEST);
        $this->template = new Template($this->config->dir_views);
        $this->user = new Users();
        $this->products = new Products();
        $this->categories = new Categorys();

        $this->template->set('config', $this->config);

        $this->template->set('title', $this->title);
        $this->template->set('meta_desc', $this->meta_desc);
        $this->template->set('meta_key', $this->meta_key);
        $this->template->set('index', $this->url->index());
        $this->template->set('cart', $this->url->cart());
        $this->template->set('content', $this->getContent());

        $this->template->set('categories', $this->categories->getAllCategories());

        $this->template->display('main');
    }

    abstract protected function getContent();

}