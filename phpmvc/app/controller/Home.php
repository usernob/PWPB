<?php

class Home extends Controller
{
    public function index()
    {
        $data["judul"] = "Home";
        $data["nama"] = "Luthfi nig gear 7";
        $this->view("home/index", $data);
    }
}
