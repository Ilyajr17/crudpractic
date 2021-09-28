<?php

namespace Views;

use Core\Singleton;


class View extends Singleton
{
    public static function render($template, $vars = [])
    {
        extract($vars);
        require_once $template.'.html';
    }
}