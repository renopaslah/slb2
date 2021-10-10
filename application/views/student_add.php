<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url('index.php/student/save/'); ?>" >
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group d-none">
                                <label>ID</label>
                                    <input name="id" type="text" class="form-control" value="0" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                    <input name="name" type="text" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                    <input name="nisn" type="text" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                            <label>Date:</label>
                                <label>Tanggal Lahir</label>
                                <input id="iDob" name="date_of_birth" type="text" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                    <input name="address" type="text" class="form-control" autocomplete="off">
                            </div>
                        </div>
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
