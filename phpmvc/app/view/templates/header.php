<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data["judul"] ?></title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.min.css">
    <script defer src="<?= BASE_URL; ?>/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark" style="position: sticky; top: 0; z-index: 60">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">SMK Negeri 2 Trenggalek</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "home") ? "active" : "" ?>" href="<?= BASE_URL ?>/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "guru") ? "active" : "" ?>" href="<?= BASE_URL ?>/guru">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "siswa") ? "active" : "" ?>" href="<?= BASE_URL ?>/siswa">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "blog") ? "active" : "" ?>" href="<?= BASE_URL ?>/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "jurusan") ? "active" : "" ?>" href="<?= BASE_URL ?>/jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= str_starts_with($_GET["url"], "user") ? "active" : "" ?>" href="<?= BASE_URL ?>/user/profile">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-column justify-content-between" style="height: 92vh;">
        <div class="container mt-2">
            <?php require_once "../app/view/" . $view . ".php" ?>
        </div>
        <?php require_once "../app/view/templates/footer.php" ?>
    </div>
</body>

</html>