<div class="row">
    <div class="col-6">
        <?php Flasher::flash() ?>
        <button type="button" class="btn btn-primary mb-4" id="modalToggle" data-action="tambah" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Guru
        </button>
        <h3>Guru</h3>
        <ul class=" list-group">
            <?php foreach ($data["guru"] as $guru) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $guru["nmGuru"] ?>
                    <div>
                        <button type="button" class="btn btn-success" id="modalToggle" data-action="edit" data-id="<?= $guru["idGuru"] ?>" data-bs-toggle="modal" data-bs-target="#formModal">edit</button>
                        <a href="<?= BASE_URL ?>/guru/hapus/<?= $guru["idGuru"] ?>" class="btn btn-danger" onclick="confirm('yakin?')">hapus</a>
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
                <h5 class="modal-title fs-5" id="formModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL; ?>/guru/tambah" method="post" id="formElement">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Guru</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" data-id_jurusan="1">
                            <option value=""></option>
                            <?php foreach ($data["jurusan"] as $jurusan) : ?>
                                <option value="<?= $jurusan["idJurusan"] ?>"><?= $jurusan["nmJurusan"] ?></option>
                            <?php endforeach ?>
                        </select>
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
            let label = "Tambah Data Guru";
            let labelButton = "Tambah data";

            let nama = document.querySelector("#nama");
            let jurusan = document.querySelector("#jurusan");
            let id = document.querySelector("#id");

            if (this.dataset.action == "edit") {
                label = "Edit Data Guru";
                labelButton = "Ubah data";

                document.querySelector("#formElement").setAttribute("action", "<?= BASE_URL ?>/guru/ubah");

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    let res = JSON.parse(this.response);
                    nama.value = res.nmGuru;
                    jurusan.dataset.id_jurusan = res.idJurusan;
                    id.value = res.idGuru;
                    var children = jurusan.children;
                    for (var i = 0; i < children.length; i++) {
                        var e = children[i];
                        if (e.value == jurusan.dataset.id_jurusan) {
                            e.setAttribute("selected", true);
                        } else {
                            e.removeAttribute("selected");
                        }
                    }
                }
                xhttp.open("POST", "<?= BASE_URL ?>/guru/getUbah", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + this.dataset.id);
            } else {
                nama.value = '';
                jurusan.dataset.id_jurusan = '';
                id.value = '';
            }


            document.querySelector("#formModalLabel").innerHTML = label;
            document.querySelector(".modal-footer button[type='submit']").innerHTML = labelButton;
        })
    })
</script>