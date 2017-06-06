<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 23:03
 */

require_once 'start.php';
require_once $dir_libs.'url_class.php';

$url = new Url();
$view = $url->getView();

$class = $view.'Content';

if(file_exists($dir_libs.$class.'_class.php')){
    require_once $dir_libs.$class.'_class.php';
    new $class;
} else {
    //todo 404
}