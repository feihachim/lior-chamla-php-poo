<?php

namespace Controllers;

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
