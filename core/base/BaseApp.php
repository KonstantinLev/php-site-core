<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 19.10.2017
 * Time: 21:23
 */

namespace core\base;


abstract class BaseApp extends Configurable
{
    public static function className()
    {
        return get_called_class();
    }

    public function __construct($config = [])
    {
        parent::__construct($config);
    }
}