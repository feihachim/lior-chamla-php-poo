<?php

namespace Controller;

require_once('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');

abstract class Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass(static::class);
    }

    private function getModelClass($controllerClass)
    {
        $modelClass = str_replace('Controllers', '\Models', $controllerClass);
        return new $modelClass();
    }
}
