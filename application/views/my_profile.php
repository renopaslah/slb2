<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ubah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url('index.php/my_profile/save/'); ?>" >
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group d-none">
                                <label>ID</label>
                                <input name="id" type="text" class="form-control" value="<?= $data['profile']['id']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                    <input name="name" type="text" class="form-control" autocomplete="off" value="<?= $data['profile']['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                    <input name="date_of_birth" id="iDob" type="text" class="form-control" autocomplete="off" value="<?= $data['profile']['date_of_birth']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                    <input name="address" type="text" class="form-control" autocomplete="off" value="<?= $data['profile']['address']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Ekstrakurikuler</label>
                                <select name="extra" class="form-control">
                                    <option value="0">Pilih</option>
                                    <?php foreach($data['extra'] as $k => $v ): ?>
                                        <option id="<?= $v['id']; ?>"><?= $v['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
