<?php

class Guru extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Data Guru",
            "guru" => $this->model("Guru_model")->getAllGuru()
        ];
        return $this->view("guru/index", $data);
    }
}
