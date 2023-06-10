<?php

class View
{
    private $model;
    private $controller;

    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;
    }

    public function output()
    {
        return '<h1>' . $this->model->text . '</h1>' . '<a href="index.php?action=clicked">' . $this->model->text . '</a>';
    }
}
