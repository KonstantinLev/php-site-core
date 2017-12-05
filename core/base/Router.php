<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 05.12.2017
 * Time: 7:40
 */

namespace core\base;

use Meow;
use core\base\Controller;

class Router extends BaseApp
{
    private $defaultController = 'Index';

    private $defaultAction = 'Index';

    private $controller;

    private $action;

    private $route;

    private $controllersPath;

    private $controllersNamespace;

    public function __construct(array $config = [])
    {

        parent::__construct($config);
    }

}