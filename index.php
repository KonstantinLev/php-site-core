<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 23:03
 */
mb_internal_encoding('UTF-8');
$dir_controllers = 'controllers/';
require_once 'routes/url_class.php';

$url = new Url();
$view = $url->getView();

$class = $view.'Controller';

if(file_exists($dir_controllers.$view.'Controller.php')){
    require_once $dir_controllers.$view.'Controller.php';
    new $class;
} else {
    require_once $dir_controllers.'NotFoundController.php';
    new NotFoundController();
}