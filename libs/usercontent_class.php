<?php

/**
 * Created by PhpStorm.
 * User: kote
 * Date: 08.06.17
 * Time: 13:38
 */

require_once 'modules_class.php';

class Usercontent extends Modules
{

    protected $title = 'Пользователи';
    protected $meta_desc = 'Пользователи';
    protected $meta_key = 'Пользователи';


    protected function getContent()
    {
        $this->template->set('user_item', 'Федор');
        return 'user';
    }

}