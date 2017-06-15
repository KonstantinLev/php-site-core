<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 5:21
 */
class Config
{
    public $sitename = 'php-site-core';
    public $address = 'http://localhost/php-site-core/';
    public $db_host = 'localhost';
    public $db_name = 'test-core';
    public $db_user = 'root';
    public $db_pass = '';
    public $db_prefix = '';
    public $sym_query = '{?}';

    public $admin = 'Konstantin';
    public $admin_mail = 'x-stels@bk.ru';

    public $dir_text = 'libs/text/';
    public $dir_views = 'views/';
    public $dir_img = 'files/img/';
    public $dir_bower_asset = 'vendor/bower-asset/';

    public $max_name = 255;
    public $max_title = 255;
    public $max_text = 66535;
}