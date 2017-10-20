<?php
/**
 * Created by PhpStorm.
 * User: kote
 * Date: 10/20/17
 * Time: 5:16 PM
 */

namespace core\base;

use Meow;

class AssetManager extends BaseApp
{
    private $assets = array();

    private function addAsset($link, $where = 'head', $asset = 'script', $type = 'url'){
        //TODO доделать
        $hash = md5('addScript'.$link.$where.$asset.$type);
        $where = $where=='head' ? 'head' : 'body';
        $asset = $asset=='script' ? 'script' : 'style';
        if (!isset($this->assets[$hash])) {
            $this->assets[$hash] = array('where'=>$where,'asset'=>$asset,'type'=>$type,'data'=>$link);
        }
    }
    public function addScript($link, $where = 'head'){
        $this->addAsset($link, $where);
    }
    public function addStyleSheet($link, $where = 'head'){
        $this->addAsset($link, $where, 'style');
    }
    public function addScriptDeclaration($data, $where = 'head'){
        $this->addAsset($data, $where, 'script', 'inline');
    }
    public function addStyleSheetDeclaration($data, $where = 'head'){
        $this->addAsset($data, $where, 'style', 'inline');
    }
}