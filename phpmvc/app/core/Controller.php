<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once "../app/view/templates/header.php";
    }

    public function model($model)
    {
        require_once "../app/model/" . $model . ".php";
        return new $model;
    }
}
