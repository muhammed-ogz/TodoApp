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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>

                                <div class="card-tools">
                                    <a href="<?= url('categories/add') ?>" class="btn btn-sm btn-dark">Add</a>
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
                                            <th style="width: 10px">#</th>
                                            <th>Title</th>
                                            <th>Created Date</th>
                                            <th>Updated Date</th>
                                            <th style="width: 40px">Proccess</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        foreach ($data as $key => $value) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?= $value['title'] ?></td>
                                                <td>
                                                    <?= $value['created_date']; ?>
                                                </td>
                                                <td>
                                                    <?= $value['updated_date']; ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a class="btn btn-sm btn-danger" href="<?= url('categories/remove/' . $value['id']); ?>">
                                                            Delete
                                                        </a>
                                                        <a class="btn btn-sm btn-info" href="<?= url('categories/edit/' . $value['id']); ?>">
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
        <script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= assets('js/adminlte.min.js'); ?>"></script>
        </body>

        </html>