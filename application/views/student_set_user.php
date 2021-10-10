<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Aktifkan User Siswa</h3>
            </div>
            <form method="post" action="<?= base_url('index.php/student/save_user/'); ?>">
                <div class="card-body">
                    <div class="form-group d-none">
                        <label>ID</label>
                        <input name="id" type="text" class="form-control" value="<?= $data['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    <a href="<?= base_url('index.php/student'); ?>" class="btn btn-warning float-right mr-1">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>