<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 19.10.2017
 * Time: 20:53
 */

namespace core\base;

use Meow;

use core\db\Connection;

class App extends BaseApp
{
    /**
     * @var Connection
     */
    public $db;
    public $basePath;
    public $request;
    public $response;
    public $router;
    public $charset = 'UTF-8';

    public function __construct($config = [])
    {
        Meow::$app = $this;
        $this->preInit($config);
        parent::__construct($config);
    }

    public function run()
    {
//        static::$instance = $this;
//        $this->_response = new Response();
//        $response = $this->_router->route();
//        $response->send();
//        return $response->exitStatus;
        $this->db = new Connection(Meow::$app->_config['db']);
//        $this->request = new Request();
//        $this->router = new Router(isset($this->_config['routing']) ? $this->_config['routing'] : []);
//        Meow::setAlias('@web', $this->request->baseUrl);
//        Meow::setAlias('@webroot', dirname($this->request->scriptFile));
//        Meow::setAlias('@meow', MEOW_PATH);
    }

    public function getDb()
    {
        return $this->db;
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    private function setBasePath($path)
    {
        $this->basePath = $path;
        Meow::setAlias('@app', $this->getBasePath());
    }

    private function preInit($config)
    {
        if (isset($config['basePath'])) {
            $this->setBasePath($config['basePath']);
        } else {
            throw new \Exception('Missed required basePath in configuration');
        }
        if (!isset($config['layout'])) {
            $this->_config['layout'] = '@app/views/layouts/main';
        }
    }
}