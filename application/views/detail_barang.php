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
                                        <p class="m-b-0">Edit Dataset</p>
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
                                                    <h3>Atribut Nama Barang</h3>
                                                </div>
                                                <div class="card-block">
                                                    <form method="POST" action="<?= base_url() ?>dataset/edit_barang">
                                                    <input type="hidden" name="id_atr_barang" value="<?php echo $detail_barang[0]->id_atr_barang ?>" >
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Kategori</label>
                                                                <div class="col-sm-10">
                                                                    <select name="kategori" class="form-control">
                                                                        <?php foreach ($list_atribut_kategori->result() as $kategori) : ?>
                                                                            <option value="<?php echo $kategori->nama_kategori ?>" <?php if($kategori->nama_kategori == $detail_barang[0]->kategori) echo "selected"?>><?php echo $kategori->nama_kategori ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Barang</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Infinix,Casing,Charger" name="nama_atribut" value="<?php echo $detail_barang[0]->nama_atribut?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tipe Barang</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Redmi Note 8, Samsung S8" name="tipe_atribut" value="<?php echo $detail_barang[0]->tipe_barang ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
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