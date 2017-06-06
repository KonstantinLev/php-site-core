<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 6:48
 */

require_once 'config.php';
require_once 'db_class.php';
require_once 'check_class.php';
require_once 'url_class.php';

abstract class GlobalClass
{
    protected $db;
    protected $table_name;
    protected $format;
    protected $config;
    protected $check;
    protected $url;

    public function __construct($table_name)
    {
        $this->db = DB::getDB();
        $this->format = new Format();
        $this->config = new Config();
        $this->check = new Check();
        $this->url = new Url();
        $this->table_name = $this->config->db_prefix.$table_name;
    }

    /**
     * @param bool $order - сортировка
     * @param bool $up - по возростанию
     * @param bool $count - кол-во элементов, которые нужно вытащить
     * @param bool $offset - смещение
     */
    public function getAll($order = false, $up = true, $count = false, $offset = false)
    {

    }

    /**
     * getOrderLimit - получить и ордер и лимит
     * @param $order
     * @param $up
     * @param $count
     * @param $offset
     * @return bool|string
     */
    protected function getOL($order, $up, $count, $offset)
    {
        if ($order) {
            $order = "ORDER BY `$order`";
            if (!$up) $order .= " DESC";
        }
        $limit = $this->getL($count, $offset);
        return "$order $limit";
    }

    /**
     * Получить лимит
     * @param $count
     * @param $offset
     * @return bool|string
     */
    protected function getL($count, $offset)
    {
        $limit = '';
        if ($count) {
            if (!$this->check->count($count)) return false;
            if($offset) {
                if (!$this->check->offset($count)) return false;
                $limit = "LIMIT $offset, $count";
            } else {
                $limit = "LIMIT $count";
            }
        }
        return $limit;
    }
}