<div class="row">
    <div class="col-6">
        <?php Flasher::flash() ?>
        <button type="button" class="btn btn-primary mb-4" id="modalToggle" data-action="tambah" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Siswa
        </button>
        <h3>Siswa</h3>
        <ul class=" list-group">
            <?php foreach ($data["siswa"] as $siswa) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $siswa["nmSiswa"] ?>
                    <div>
                        <a href="<?= BASE_URL ?>/siswa/detail/<?= $siswa["idSiswa"] ?>" class="btn btn-primary">detail</a>
                        <button type="button" class="btn btn-success" id="modalToggle" data-action="edit" data-id="<?= $siswa["idSiswa"] ?>" data-bs-toggle="modal" data-bs-target="#formModal">edit</button>
                        <a href="<?= BASE_URL ?>/siswa/hapus/<?= $siswa["idSiswa"] ?>" class="btn btn-danger" onclick="confirm('yakin?')">hapus</a>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="formModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL; ?>/siswa/tambah" method="post" id="formElement">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="laki-laki">Laki - laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll("#modalToggle").forEach((element) => {
        element.addEventListener("click", function() {
            let label = "Tambah Data Siswa";
            let labelButton = "Tambah data";

            let nama = document.querySelector("#nama");
            let jenis_kelamin = document.querySelector("#jenis_kelamin");
            let alamat = document.querySelector("#alamat");
            let id = document.querySelector("#id");

            if (this.dataset.action == "edit") {
                label = "Edit Data Siswa";
                labelButton = "Ubah data";

                document.querySelector("#formElement").setAttribute("action", "<?= BASE_URL ?>/siswa/ubah");

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    let res = JSON.parse(this.response);
                    nama.value = res.nmSiswa;
                    jenis_kelamin.value = res.jenis_kelamin;
                    alamat.value = res.alamat;
                    id.value = res.idSiswa;
                }
                xhttp.open("POST", "<?= BASE_URL ?>/siswa/getUbah", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + this.dataset.id);
            }

            document.querySelector("#formModalLabel").innerHTML = label;
            document.querySelector(".modal-footer button[type='submit']").innerHTML = labelButton;
        })
    })
</script>