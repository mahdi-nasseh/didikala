<?php

namespace Didikala\Lib;

class Core
{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //check the controller exist or not
        if (file_exists('../App/Controller/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        $controller = "\Didikala\Controller\\$this->currentController";
        $this->currentController = new $controller;

        //check methods exist or not
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
        }

        //get params if exist
        $this->params = isset($url[2]) ? array_values($url) : [];

        //call a callback with array of param
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
            return $url = explode('/', $url);
        }else{
            return ['index'];
        }
    }
}