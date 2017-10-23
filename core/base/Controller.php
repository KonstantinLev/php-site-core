<?php
/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 23.10.2017
 * Time: 8:27
 */

namespace core\base;

use Meow;
use core\base\Except;


abstract class Controller extends BaseApp
{
    public $layout = 'main';
    public $viewName;
    public $viewData;

    public $basePath;
    public $viewsPath;

    function __call($methodName, $args=array()){
        if (method_exists($this, $methodName))
            return call_user_func_array(array($this,$methodName),$args);
        else
            throw new Except('In controller '.get_called_class().' method '.$methodName.' not found!');
    }

    public function __construct()
    {
        $config = Meow::$app->_config;
        $this->layout = $config['layout'];
        $this->basePath = $config['basePath'];
        $this->viewsPath = $config['baseViewsPath'];
        parent::__construct([]);
    }

    public abstract function actionIndex();

    //TODO доделать
    public function addScript($link, $where = 'head'){
        Meow::$app->assetM->addAsset($link, $where);
    }
    public function addStyleSheet($link, $where = 'head'){
        Meow::$app->assetM->addAsset($link, $where, 'style');
    }
    public function addScriptDeclaration($data, $where = 'head'){
        Meow::$app->assetM->addAsset($data, $where, 'script', 'inline');
    }
    public function addStyleSheetDeclaration($data, $where = 'head'){
        Meow::$app->assetM->addAsset($data, $where, 'style', 'inline');
    }

}