<div class="flex justify-between pt-4">
    <h1 class="text-md font-bold text-blue-200">Proyek</h1>
    <button onclick="addModalShow(this)" class="btn btn-primary btn-sm">Tambah proyek</button>
</div>
<div class="overflow-x-auto mt-5">
    <table class="table table-md shadow-lg border-radius-md">
        <thead>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">ID</th>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">Nama Proyek</th>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">Client</th>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">Tanggal Mulai/Selesai</th>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">Pimpinan</th>
            <th class="bg-yellow-100 border text-base-100 text-left px-4 py-4">Aksi</th>
        </thead>
        <tbody>
            <?php foreach ($projects as $project) : ?>
                <tr>
                    <td class="border border-yellow-100 px-4 py-4"><?= $project->id ?></td>
                    <td class="border border-yellow-100 px-4 py-4"><?= $project->nama_proyek ?></td>
                    <td class="border border-yellow-100 px-4 py-4"><?= $project->client ?></td>
                    <td class="border border-yellow-100 px-4 py-4"><?= date('d-m-Y', strtotime($project->tgl_mulai)) ?> - <?= date('d-m-Y', strtotime($project->tgl_selesai)) ?></td>
                    <td class="border border-yellow-100 px-4 py-4"><?= $project->pimpinan_proyek ?></td>
                    <td class="border border-yellow-100 px-4 py-4">
                        <?php
                        $locationIds = "";
                        foreach ($project->lokasi as $location) {
                            if ($locationIds != "") {
                                $locationIds .= ",";
                            }
                            $locationIds .= $location->id;
                        }
                        ?>
                        <button data-lokasi="<?= $locationIds ?>" data-nama_proyek="<?= $project->nama_proyek ?>" data-client="<?= $project->client ?>" data-tgl_mulai="<?= date('Y-m-d\TH:i', strtotime($project->tgl_mulai)) ?>" data-tgl_selesai="<?= date('Y-m-d\TH:i', strtotime($project->tgl_selesai)) ?>" data-pimpinan_proyek="<?= $project->pimpinan_proyek ?>" data-keterangan="<?= $project->keterangan ?>" onclick="addModalShow(this, '/proyek/<?= $project->id ?>/edit')" class="btn bg-yellow-200 hover:bg-yellow-600 text-black btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                            </svg>
                        </button>
                        <button onclick="deleteModalShow('/proyek/<?= $project->id ?>/delete')" class="btn bg-red-500 hover:bg-red-800 btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                            </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<dialog id="cr-modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold" id="modal-title">Modal!</h3>
        <form method="POST" id="form-modal">
            <label class="form-control w-full mb-3">
                <div class="label label-text">Nama Proyek</div>
                <input type="text" name="nama_proyek" id="nama-proyek" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full mb-3">
                <div class="label label-text">Client</div>
                <input type="text" name="client" id="client" class=" input input-bordered w-full" />
            </label>
            <label class="form-control w-full mb-3">
                <div class="label label-text">Pimpinan</div>
                <input type="text" name="pimpinan" id="pimpinan" class=" input input-bordered w-full" />
            </label>
            <label class="form-control w-full mb-3">
                <div class="label label-text">Lokasi</div>
                <select class="select select-bordered" multiple name="lokasi[]" id="lokasi">
                    <?php foreach ($locations as $location) : ?>
                        <option value="<?= $location->id ?>"><?= $location->nama_lokasi ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="form-control w-full mb-3">
                <div class="label label-text">Mulai</div>
                <input type="datetime-local" name="tgl_mulai" id="tgl-mulai" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full mb-3">
                <div class="label label-text">Selesai</div>
                <input type="datetime-local" name="tgl_selesai" id="tgl-selesai" class="input input-bordered w-full" />
            </label>
            <label class="form-control mb-3">
                <div class="label label-text">Keterangan </div>
                <textarea class="textarea textarea-bordered h-24" name="keterangan" id="keterangan"></textarea>
            </label>
            <button class="btn bg-blue-500 btn-sm">Save</button>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="delete-modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold" id="modal-title">Modal!</h3>
        <p class="py-4">Kamu yakin akan menghapus data ini?</p>
        <div class="flex">
            <form method="POST" id="form-delete-modal" class="mr-2">
                <button class="btn bg-red-500 btn-sm">Hapus</button>
            </form>

            <form method="dialog">
                <button class="btn btn-sm">Tutup</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script type="text/javascript">
    function addModalShow(e, action = null) {
        document.getElementById("modal-title").textContent = action ? "Edit Proyek" : "Tambah Proyek"
        const lokasiElement = document.getElementById("lokasi");
        const choices = new Choices(lokasiElement)

        let form = document.getElementById("form-modal")
        form.reset()

        if (action) {
            form.setAttribute('action', action)

            const lokasiSelected = e.dataset.lokasi.split(',')
            choices.setChoiceByValue(lokasiSelected)

            document.getElementById('nama-proyek').value = e.dataset.nama_proyek
            document.getElementById('client').value = e.dataset.client
            document.getElementById('pimpinan').value = e.dataset.pimpinan_proyek
            document.getElementById('tgl-mulai').value = e.dataset.tgl_mulai
            document.getElementById('tgl-selesai').value = e.dataset.tgl_selesai
            document.getElementById('keterangan').value = e.dataset.keterangan
        }

        document.getElementById("cr-modal").showModal()
    }

    function reset() {
        document.getElementById('nama-proyek').value = ""
        document.getElementById('client').value = ""
        document.getElementById('pimpinan').value = ""
        document.getElementById('tgl-mulai').value = ""
        document.getElementById('tgl-selesai').value = ""
        document.getElementById('keterangan').value = ""
    }

    function deleteModalShow(action) {
        document.getElementById('form-delete-modal').setAttribute('action', action)
        document.getElementById('delete-modal').showModal()
    }
</script>