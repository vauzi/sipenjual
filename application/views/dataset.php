<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <?php $this->load->view('__partials/headernav') ?>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <?php $this->load->view('__partials/sidenav') ?>
                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">DataSet</h5>
                                        <p class="m-b-0">Menambah Data</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!--  -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Atribut Kategori</h3>
                                                </div>
                                                <div class="card-block">
                                                    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#add_atribut_kategori"><i class="ti-plus"></i>Add Atribut Kategori</button>
                                                    <?php
                                                    if ($this->session->flashdata('message_kategori')) {
                                                        $response = $this->session->flashdata('message_kategori');
                                                        if ($response['status']) {
                                                    ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-stripped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kategori</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($list_atribut_kategori->result() as $atribut_kategori) : ?>
                                                                    <tr>
                                                                        <td><?= $atribut_kategori->nama_kategori ?></td>
                                                                        <td><button class="btn btn-danger" id="" onclick="return deleteRowKategori('<?= $atribut_kategori->id_kategori ?>')" data-id=''><i class="ti-trash"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                endforeach;
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Atribut Nama Barang</h3>
                                                </div>
                                                <div class="card-block">
                                                    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#add_atribut_barang"><i class="ti-plus"></i>Add Atribut Barang</button>
                                                    <?php
                                                    if ($this->session->flashdata('message_barang')) {
                                                        $response = $this->session->flashdata('message_barang');
                                                        if ($response['status']) {
                                                    ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-stripped" id="tbl_barang">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Barang</th>
                                                                    <th>Kategori</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($list_atribut_barang->result() as $atribut_barang) : ?>
                                                                    <tr>
                                                                        <td><?= $atribut_barang->nama_atribut ?></td>
                                                                        <td><?= $atribut_barang->kategori ?></td>
                                                                        <td><button class="btn btn-warning" id="editattr" onclick="window.location='<?= base_url('dataset/detail_barang/'.$atribut_barang->id_atr_barang) ?>'"><i class="ti-pencil-alt"></i></button> | <button class="btn btn-danger" id="hapus_atribut_btn" onclick="return deleteRowBarang('<?= $atribut_barang->id_atr_barang ?>')" data-id=''><i class="ti-trash"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                endforeach;
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>DataSet</h3>
                                                </div>
                                                <div class="card-block">
                                                    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#add_dataset"><i class="ti-plus"></i>Add Dataset</button>
                                                    <?php
                                                    if ($this->session->flashdata('message_dataset')) {
                                                        $response = $this->session->flashdata('message_dataset');
                                                        if ($response['status']) {
                                                    ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <?php echo $response['message'] ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-stripped" id="tbl_dataset">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kategori</th>
                                                                    <th>Barang</th>
                                                                    <th>Stok</th>
                                                                    <th>Terjual</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($list_dataset->result() as $dataset) : ?>
                                                                    <tr>
                                                                        <td><?= $dataset->kategori ?></td>
                                                                        <td><?= $dataset->nama_barang ?></td>
                                                                        <td><?= $dataset->stok ?></td>
                                                                        <td><?= $dataset->terjual ?></td>
                                                                        <td><?= $dataset->status ?></td>

                                                                    </tr>
                                                                <?php
                                                                endforeach;
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Modal Add Atribut -->
<?php $this->load->view('modals/modal_add_dataset',$list_atribut_kategori) ?>
<?php $this->load->view('modals/modal_add_barang', $list_atribut_kategori) ?>
<?php $this->load->view('modals/modal_add_kategori') ?>

<script type="text/javascript">
   $(document).ready(function() {
    $('#tbl_barang').DataTable({
        "aaSorting": []
    });
    $('#tbl_dataset').DataTable({
        "aaSorting": []
    });
} );
    // Delete Kategori
    function deleteRowKategori(id) {
        swal({
                title: 'Hapus Atribut Kategori',
                text: 'Anda yakin ingin hapus item ini ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = `<?= base_url('dataset/hapus_kategori/') ?>${id}`
                }
            }
        )
    }

    //  Delete Barang
    function deleteRowBarang(id) {
        swal({
                title: 'Hapus Atribut Nama Barang',
                text: 'Anda yakin ingin hapus item ini ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = `<?= base_url('dataset/hapus_barang/') ?>${id}`
                }
            }
        )
    }
</script>