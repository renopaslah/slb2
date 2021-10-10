<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row mb-0">
                    <div class="col-md-10">
                        <div class="input-group input-group-sm" style="">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?=base_url('index.php/admin/add');?>"
                            class="btn btn-sm btn-primary btn-block">Tambah</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-success m-3" role="alert">
                    <?=$this->session->flashdata('info');?>
                </div>
            <?php endif;?>

                <?php if (count($data) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $k => $v): ?>
                        <tr>
                            <td><?=$k + 1;?></td>
                            <td>
                                <a href="<?=base_url('index.php/student/edit/' . $v['id']);?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?=base_url('index.php/student/delete/' . $v['id']);?>"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="alert alert-warning m-3" role="alert">
                    Data tidak tersedia
                </div>
                <?php endif;?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>