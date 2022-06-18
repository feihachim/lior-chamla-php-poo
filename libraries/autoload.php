<?php

spl_autoload_register(function ($className)
{
    $className = str_replace("\\", "/", $className);
    $list = explode('/', $className);
    if (count($list) === 2)
    {
        $className = strtolower($list[0]) . '/' . $list[1];
    }
    require_once("libraries/$className.php");
});
