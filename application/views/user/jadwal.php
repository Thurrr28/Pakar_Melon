<!--body list Rps -->
<div class="row">
    <div class="container">
        <div class="container-fluid card">
            <h1 class="h3 mb-4 mt-2 text-gray-800"><?= $title ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <nav class="navbar navbar-inverse position-absolute top-0 end-0">
                <div class="container-fluid">
                    <a href="<?= base_url('user/createmateri'); ?>" class="btn btn-primary navbar-btn border mt-1" data-toggle="modal" data-target="#newSubMenuModal"><i class="bi bi-plus-lg"></i></a>
                </div>
            </nav>
            <table class="table-bordered table table-hover text-center border shadow-sm p-3 mb-5 bg-white rounded">
                <tr>
                    <th class="bg-body-secondary" scope="col">No</th>
                    <th class="bg-body-secondary">Ruang</th>
                    <th class="bg-body-secondary">Mata Kuliah</th>
                    <th class="bg-body-secondary">Waktu</th>
                    <th class="bg-body-secondary">Metode</th>
                    <th class="bg-body-secondary">Action</th>
                </tr>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($datarps as $mat) : ?>
                        <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td><?= $mat['ruang']; ?></td>
                            <td><?= $mat['matkul']; ?></td>
                            <td><?= $mat['waktu_mengajar']; ?></td>
                            <td><?= $mat['metode_pelajaran']; ?></td>
                            <td>
                                <a class="border btn btn-warning" href="<?= base_url('user/editjadwal/') . $mat['id_jadwal']; ?>"><i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="border btn btn-danger" href="<?= base_url('user/deletejadwal/') . $mat['id_jadwal']; ?>" onclick="return confirm('Are you sure to delete this?')"><i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/createjadwal'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="ruang" placeholder="Ruang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="matkul" name="matkul" placeholder="Nama Mata Kuliah" required>
                    </div>
                    <div class="form-group">
                        <select name="waktu_mengajar" class="bg-light input form-control" required>
                            <selected value="Select">
                                <option value="07:00:00">07:00:00</option>
                                <option value="08:50:00">08:50:00</option>
                                <option value="10:40:00">10:40:00</option>
                                <option value="13:20:00">13:20:00</option>
                                <option value="15:30:00">15:30:00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="metode_pelajaran" id="metode" class="form-control" required>
                            <selected value="Select">
                                <option>Daring</option>
                                <option>Luring</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>