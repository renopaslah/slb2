<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ubah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url('index.php/extracurricular/save/'); ?>" >
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group d-none">
                                <label>ID</label>
                                <input name="id" type="text" class="form-control" value="<?= $data['id']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                    <input name="name" type="text" class="form-control" autocomplete="off" value="<?= $data['name']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    <a href="<?= base_url('index.php/extracurricular'); ?>" class="btn btn-warning float-right mr-1">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
