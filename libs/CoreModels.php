<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 10.06.2017
 * Time: 16:08
 */

require_once 'config/config.php';
require_once 'db_class.php';
require_once 'check_class.php';
require_once 'CoreUrl.php';

abstract class CoreModels
{
    protected $db;
    protected $table_name;
    protected $format;
    protected $config;
    protected $check;
    private $url;

    public function __construct($table_name)
    {
        $this->db = DB::getDB();
        $this->format = new Format();
        $this->config = new Config();
        $this->check = new Check();
        $this->url = new CoreUrl();
        $this->table_name = $this->config->db_prefix.$table_name;
    }

    public function get($id)
    {
        if (!$this->check->id($id)) return false;
        return $this->getOnField('id', $id);
    }

    protected function getOnField($field, $value)
    {
        $query = 'SELECT * FROM `'.$this->table_name."` WHERE `$field` = ".$this->config->sym_query;
        return $this->db->selectRow($query, array($value));
    }

    /**
     * @param bool $order - сортировка
     * @param bool $up - по возростанию
     * @param bool $count - кол-во элементов, которые нужно вытащить
     * @param bool $offset - смещение
     */
    protected function getAll($order = false, $up = true, $count = false, $offset = false)
    {
        $ol = $this->getOL($order, $up, $count, $offset);
        $query = "SELECT * FROM `".$this->table_name."` $ol";
        return $this->db->select($query);
    }

    protected function getAllOnField($v_where, $order = false, $up = true, $count = false, $offset = false)
    {
        $where = ' WHERE ';
        $values = array();
        $index = 0;
        foreach ($v_where as $key => $val){
            $where .= "`".$key."` = ".$this->config->sym_query;
            if (++$index != count($v_where)){
                $where .= " AND ";
            }
            $values[] = $val;
        }
        $ol = $this->getOL($order, $up, $count, $offset);
        $query = "SELECT * FROM `".$this->table_name."`".$where." $ol";
        return $this->db->select($query, $values);
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

    public function getTableName()
    {
        return $this->table_name;
    }

    public function existsID($id)
    {
        if (!$this->check->id($id)) return false;
        return $this->isExistsFV('id', $id);
    }

    protected function isExistsFV($field, $value)
    {
        $result = $this->getAllOnField(array($field => $value));
        return count($result) != 0;
    }

    protected function transform($element)
    {
        if (!$element) return false;
        if (isset($element[0])){
            for($i = 0; $i < count($element); $i++){
                $element[$i] = $this->transformElement($element[$i]);
            }
            return $element;
        } else {
            return $this->transformElement($element);
        }
    }
}