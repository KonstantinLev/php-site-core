<?php
mb_internal_encoding('UTF-8');
require_once 'libs/manage_class.php';
require_once 'routes/url_class.php';

$url = new Url();
$manage = new Manage();
$func = $_REQUEST['func'];
switch ($func){
    case 'add_cart':
        $manage->addCart();
        break;
    case 'delete_cart':
        $manage->deleteCart();
        break;
    case 'cart':
        $manage->updateCart();
        break;
    default:
        exit;
}
$link = ($_SERVER['HTTP_REFERER'] != '') ? $_SERVER['HTTP_REFERER'] : $url->index();
header('Location: '.$link);
exit;