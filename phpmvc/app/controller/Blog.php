<?php

class Blog extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Blog",
            "blog" => $this->model("Blog_model")->getAllBlog()
        ];
        $this->view("blog/index", $data);
    }
}
