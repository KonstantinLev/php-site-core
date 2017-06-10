<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 16:10
 */

require_once 'libs/CoreModels.php';

class BaseModels extends CoreModels
{
    public function __construct($table_name)
    {
        parent::__construct($table_name);
    }
}