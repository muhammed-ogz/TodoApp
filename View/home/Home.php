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
                <h5 class="mt-4 mb-2"> Your current status <code><?= date('Y-m-d')?></code></h5>
            <div class="row">
              <?php foreach($data as $row): ?> 
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-<?= status($row['status'])['color'] ?>">
              <span class="info-box-icon"><i class="<?= status($row['status'])['icon'] ?>"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?= status($row['status'])['title'] ?></span>
                <span class="info-box-number"><?= $row['toplam']?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  <?= number_format($row['yuzde'])?>% of the <?= $row['toplam']?> todos <?= status($row['status'])['statusmsg'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php endforeach; ?>
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