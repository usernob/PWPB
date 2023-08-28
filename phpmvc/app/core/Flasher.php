<?php
class Flasher
{
    public static function setFlash($pesan, $aksi, $type)
    {
        $_SESSION['flash'] = [
            "pesan" => $pesan,
            "aksi"  => $aksi,
            "type"  => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">';
            echo '<strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['flash']);
        }
    }
}
