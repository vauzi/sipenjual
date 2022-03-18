<!DOCTYPE html>
<html lang="en">


<body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php $this->load->view('__partials/headernav'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php $this->load->view('__partials/sidenav'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to Naive Bayes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body row">
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-purple"><?= count($list_atribut_kategori->result()) ?></h4>
                                                            <h6 class="text-muted m-b-0">Atribut Kategori</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-bar-chart f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-9">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-purple"><?= count($list_atribut_barang->result()) ?></h4>
                                                            <h6 class="text-muted m-b-0">Atribut Nama Barang</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-bar-chart f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <h4 class="text-c-purple"><?= count($list_dataset->result()) ?></h4>
                                                            <h6 class="text-muted m-b-0">Dataset</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <i class="fa fa-bar-chart f-28"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>List Hasil Analisa</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-stripped">
                                                    <tr class="bg-info">
                                                        <th>No.</th>
                                                        <th>Kategori</th>
                                                        <th>Barang</th>
                                                        <th>Laku</th>
                                                        <th>Tidak Laku</th>
                                                        <th>Data Asli</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                    <?php 
                                                    
                                                    $no = 1;
                                                    foreach ($list_report->result() as $report) {
                                                    ?>
                                                        <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $report->kategori ?></td>
                                                        <td><?= $report->nama_barang ?></td>
                                                        <td><?= round($report->laku) ?>%</td>
                                                        <td><?= round($report->tidak_laku) ?>%</td>
                                                        <td><?php echo get_dataset($report->kategori,$report->nama_barang) ?></td>
                                                        <td><?= $report->hasil ?></td>
                                                        </tr>
                                                    <?php
                                                    $no++;
                                                    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>