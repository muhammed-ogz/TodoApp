<?php view('static/header') ?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= URL . 'cikis'; ?>" class="nav-link">Log Out</a>
            </li>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </li>
        </ul>
    </nav>
    <?php view('static/sidebar'); ?>
    <div class="content-wrapper p-5">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Your Profile</h3>
                            </div>
                            <form id="profile">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input type="text" class="form-control" value="<?= get_session('name'); ?>" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Surname</label>
                                        <input type="text" class="form-control" value="<?= get_session('surname'); ?>" id="surname">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" value="<?= get_session('email'); ?>" id="email">
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Change Password</h3>
                            </div>

                            <form id="password_change" action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="old_password">Old password</label>
                                        <input type="text" class="form-control" id="old_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New password</label>
                                        <input type="text" class="form-control" id="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_again">New password again</label>
                                        <input type="text" class="form-control" id="password_again">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" value="1" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php view('static/footer'); ?>
</div>
<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('plugins/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js'); ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.js'); ?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js" integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const profile = document.getElementById('profile');
    const password_change = document.getElementById('password_change');

    profile.addEventListener('submit', (e) => {

        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;

        let formData = new FormData();

        formData.append('name', name);
        formData.append('surname', surname);
        formData.append('email', email);

        axios.post('<?= url('api/profile') ?>', formData).then(res => {

            swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status,
            );


            console.log(res)
        }).catch(err => console.log(err))


        e.preventDefault();
    });

    password_change.addEventListener('submit', (e) => {

        let old_password = document.getElementById('old_password').value;
        let password = document.getElementById('password').value;
        let password_again = document.getElementById('password_again').value;

        let formData = new FormData();

        formData.append('old_password', old_password);
        formData.append('password', password);
        formData.append('password_again', password_again);

        axios.post('<?= url('api/changepassword') ?>', formData).then(res => {

            swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status,
            );


            console.log(res);
        }).catch(err => console.log(err))


        e.preventDefault();
    });
</script>
</body>

</html>