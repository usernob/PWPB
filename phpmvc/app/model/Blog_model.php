<?php
class Blog_model
{
    protected $blog = [
        [
            "penulis" => "Guru RPL",
            "judul" => "Belajar PHP MVC",
            "tulisan" => "Models"
        ],
        [
            "penulis" => "Guru RPL",
            "judul" => "Belajar PHP MVC",
            "tulisan" => "View"
        ],
        [
            "penulis" => "Guru RPL",
            "judul" => "Belajar PHP MVC",
            "tulisan" => "Controllers"
        ]
    ];
    public function getAllBlog()
    {
        return $this->blog;
    }
}
