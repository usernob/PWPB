<?php

class User extends Controller
{
    public function index()
    {
        $data["judul"] = "User";
        $this->view("user/index", $data);
    }

    public function profile($nama = "Lutfi nig gear 7", $pekerjaan = "Bajak Lawuh")
    {
        $data = [
            "judul" => "User",
            "nama" => $nama,
            "pekerjaan" => $pekerjaan
        ];
        $this->view("user/profile", $data);
    }
}
