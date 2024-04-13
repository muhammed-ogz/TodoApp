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
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                               aria-label="Search">
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Todos</h3>

                                <div class="card-tools">
                                    <a href="<?= url('todo/add') ?>" class="btn btn-sm btn-dark">Add</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">

                                <?php

                                echo get('message') ? '<div class ="alert alert-' . get('type') . '" >' . get('message') . '</div>' : null;
                                ?>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Started Date</th>
                                        <th>End Date</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1;
                                    foreach ($data as $key => $value) : ?>
                                        <tr id="row_<?= $value['id'] ?>">

                                            <td><?= $value['title'] ?></td>
                                            <td><?= $value['category_title'] ?></td>
                                            <td>
                                                <?= $value['start_date']; ?>
                                            </td>
                                            <td>
                                                <?= $value['end_date']; ?>
                                            </td>
                                            <td>
                                                <?= $value['progress']; ?>%
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger"
                                                         style="width: <?= $value['progress']; ?>%"></div>
                                                </div>
                                            </td>
                                            </td>
                                            <td>
                                                <span class="badge bg-<?= status($value['status'])['color']; ?>"><?= status($value['status'])['title'] ?></span>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="removeTodo('<?= $value['id'] ?>')">
                                                        Delete
                                                    </button>
                                                    <a class="btn btn-sm btn-info"
                                                       href="<?= url('todo/edit/' . $value['id']); ?>">
                                                        Update
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js'); ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"
        integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function removeTodo(id) {
        let formData = new FormData();
        formData.append('id', id);
        axios.post('<?= url('api/removetodo') ?>', formData).then(res => {

            if (res.data.id) {
                let row = document.getElementById('row_' + res.data.id);
                row.remove();
            }


            swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status,
            );
            console.log(res)
        }).catch(err => console.log(err))
    }
</script>
</body>

</html>