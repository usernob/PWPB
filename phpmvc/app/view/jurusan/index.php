<div class="row">
    <div class="col-6">
        <?php Flasher::flash() ?>
        <button type="button" class="btn btn-primary mb-4" id="modalToggle" data-action="tambah" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Kompetensi Keahlian
        </button>
        <h3>Kompetensi Keahlian</h3>
        <ul class=" list-group">
            <?php foreach ($data["jurusan"] as $jurursan) : ?>
                <li class="list-group-item d-flex flex-column justify-content-between align-items-start gap-4">
                    <h2>
                        <?= $jurursan["nmJurusan"] ?>
                    </h2>
                    <?= $jurursan["DetailJurusan"] ?>
                    <div>
                        <button type="button" class="btn btn-success" id="modalToggle" data-action="edit" data-id="<?= $jurursan["idJurusan"] ?>" data-bs-toggle="modal" data-bs-target="#formModal">edit</button>
                        <a href="<?= BASE_URL ?>/jurusan/hapus/<?= $jurursan["idJurusan"] ?>" class="btn btn-danger" onclick="confirm('yakin?')">hapus</a>
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
                <h5 class="modal-title fs-5" id="formModalLabel">Tambah Data Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL; ?>/jurusan/tambah" method="post" id="formElement">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea class="form-control" id="detail" name="detail">
                        </textarea>
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
            let label = "Tambah Data Jurusan";
            let labelButton = "Tambah data";

            let nama = document.querySelector("#nama");
            let detail = document.querySelector("#detail");
            let id = document.querySelector("#id");

            if (this.dataset.action == "edit") {
                label = "Edit Data Jurusan";
                labelButton = "Ubah data";

                document.querySelector("#formElement").setAttribute("action", "<?= BASE_URL ?>/jurusan/ubah");

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    let res = JSON.parse(this.response);
                    nama.value = res.nmJurusan;
                    detail.value = res.DetailJurusan;
                    id.value = res.idJurusan;
                }
                xhttp.open("POST", "<?= BASE_URL ?>/jurusan/getUbah", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + this.dataset.id);
            } else {
                nama.value = '';
                detail.value = '';
                id.value = '';
            }

            document.querySelector("#formModalLabel").innerHTML = label;
            document.querySelector(".modal-footer button[type='submit']").innerHTML = labelButton;
        })
    })
</script>