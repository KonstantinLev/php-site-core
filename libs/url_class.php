<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 5:50
 */

require_once 'config/config.php';

class Url
{

    private $config;
    private $amp;

    public function __construct($amp = true)
    {
        $this->config = new Config();
        $this->amp = $amp;
    }

    public function getView()
    {
        $view = $_SERVER['REQUEST_URI'];
        $view = substr($view, 1);
        if (($pos = strpos($view, '?')) !== false){
            $view = substr($view, 0, $pos);
        }
        $view = str_replace($this->config->sitename.'/', '', $view);
        return $view;
    }

    public function setAMP($amp)
    {
        $this->amp = $amp;
    }

    public function getThisURL()
    {
        $uri = substr($_SERVER['REQUEST_URI'], 1);
        return $this->config->address.$uri;
    }

    private function deleteGET($url, $name, $amp = true)
    {
        $url = str_replace("&amp;", "&", $url); // Заменяем сущности на амперсанд, если требуется
        list($url_part, $qs_part) = array_pad(explode("?", $url), 2, ""); // Разбиваем URL на 2 части: до знака ? и после
        parse_str($qs_part, $qs_vars); // Разбиваем строку с запросом на массив с параметрами и их значениями
        unset($qs_vars[$name]); // Удаляем необходимый параметр
        if (count($qs_vars) > 0) { // Если есть параметры
            $url = $url_part."?".http_build_query($qs_vars); // Собираем URL обратно
            if ($amp) $url = str_replace("&", "&amp;", $url); // Заменяем амперсанды обратно на сущности, если требуется
        }
        else $url = $url_part; // Если параметров не осталось, то просто берём всё, что идёт до знака ?
        return $url; // Возвращаем итоговый URL
    }

    public function index()
    {
        return $this->returnURL('');
    }

    public function cart()
    {
        return $this->returnURL('cart');
    }

    public function user($id)
    {
        return $this->returnURL("user?id_user=$id");
    }

    private function returnURL($url, $index = false)
    {
        if (!$index) $index = $this->config->address;
        if ($url == '') return $index;
        if (strpos($url, $index) !== 0) $url = $index.$url;
        if ($this->amp) $url = str_replace("&", "&amp;", $url);
        return $url;
    }



}