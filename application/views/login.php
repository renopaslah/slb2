<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-primary">
            <div class="card-body">
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning" role="alert">
                    <?=$this->session->flashdata('info');?>
                </div>
                <?php endif;?>
                <p class="login-box-msg">Silahkan login</p>
                <form action="<?= base_url('index.php/login/auth/'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</div>
</div>