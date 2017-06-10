<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 15:42
 */

require_once 'config/config.php';
require_once 'url_class.php';
require_once 'format_class.php';
require_once 'template_class.php';

abstract class CoreController
{
    protected $config;
    protected $request;
    protected $url;
    protected $format;
    protected $template;

    public function __construct()
    {
        session_start();
        $this->config = new Config();
        $this->url = new Url();
        $this->format = new Format();
        $this->request = $this->format->xss($_REQUEST);
        $this->template = new Template($this->config->dir_views);


    }

    abstract protected function getContent();

    protected function getRequest($name)
    {
        return $this->request[$name];
    }

    protected function notFound()
    {
        $this->redirect($this->url->notFound());
    }

    protected function redirect($link)
    {
        header('Location: '.$link);
        exit;
    }

}