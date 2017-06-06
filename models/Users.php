<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 21:15
 */

require_once '../libs/global_class.php';

class Users extends GlobalClass
{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function getAllUsers()
    {
        return $this->getAll('login', true);
    }
}