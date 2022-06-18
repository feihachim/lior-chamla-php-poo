<?php

class Renderer
{
    /**
     * Affiche un template HTML en injectant les variables
     *
     * @param string $path
     * @param array $variables
     * @return void
     */
    public static function render(string $path, array $variables = []): void
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
}
