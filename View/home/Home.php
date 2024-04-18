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
    <div class="content-wrapper p-3">
        <div class="content">
            <div class="container-fluid">
                <h5 class="mt-4 mb-2"> Your current status <code><?= date('Y-m-d') ?></code></h5>
                <div class="row">
                    <?php foreach ($data['statistics'] as $row) : ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box bg-<?= status($row['status'])['color'] ?>">
                                <span class="info-box-icon"><i class="<?= status($row['status'])['icon'] ?>"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?= status($row['status'])['title'] ?></span>
                                    <span class="info-box-number"><?= $row['toplam'] ?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?= number_format($row['yuzde']) ?>% of the <?= $row['toplam'] ?> todos <?= status($row['status'])['statusmsg'] ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <!-- TimeLine Model Start Code -->
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <?php foreach ($data['inproc'] as $todo) : ?>
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red"><?= date('d / m / Y', strtotime($todo['start_date'])) ?></span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fa fa-check" style="background-color: <?= $todo['color'] ?>;"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i><?= date('H:i', strtotime($todo['start_date'])) ?></span>
                                        <h3 class="timeline-header"><span class=" badge bg-success"><?= $todo['category_title']; ?></span>
                                            <span class="badge bg-danger"><?= $todo['title'] ?> </span>
                                        </h3>

                                        <div class="timeline-body">
                                            <span class="badge bg-warning p-2">Description : </span> <?= $todo['description'] ?>
                                            <br>
                                            <span class="badge bg-success"><?= $todo['progress']; ?>%</span>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: <?= $todo['progress']; ?>%"></div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href=" <?= url('todo/edit/' . $todo['id']); ?>" class="btn btn-primary btn-sm">Go to</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-green"><?= date('d-m-Y'); ?></span>
                            </div>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
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
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
</body>

</html>