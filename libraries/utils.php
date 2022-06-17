<?php

//render('articles/show')
function render(string $path, array $variables = [])
{
    //extract transforme un tableau de variables en une suite de variables
    // extract(['var1'=>2,'var2'=>"Lior"]) équivaut à :
    // $var1 = 2;
    // $var2 = "Lior";
    extract($variables);

    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}


function redirect(string $url): void
{
    header("Location: $url");
    exit();
}
