<?php view('static/header') ?>
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Todo</b>App</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?= lang('Lütfen Giriş Yapınız'); ?></p>
                <?php 
                    echo get_session('error') != false ? '<div class ="alert alert-'.$_SESSION['error']['type'].'" >'.$_SESSION['error']['message'].'</div>' : null;
                ?>
                <form action="<?php URL.'login' ; ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="<?= $_SESSION['post']['email'] ?? '' ?>" class="form-control" placeholder="<?= lang('E-posta'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" value="<?= $_SESSION['post']['password'] ?? '' ?>" class="form-control" placeholder="<?= lang('Şifre'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" value="1" class="btn btn-primary btn-block">Sign In</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
</body>

</html>