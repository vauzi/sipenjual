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
                                            <h5 class="m-b-10">Analisa</h5>
                                            <p class="m-b-0">Lakukan Analisa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Main-body start -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Analisa</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="POST" id="analisa_form">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Kategori</label>
                                                                <div class="col-sm-10">
                                                                    <select name="kategori" class="form-control" id="select_kategori" required>
                                                                        <?php foreach ($list_atribut_kategori->result() as $kategori) : ?>
                                                                            <option value="<?php echo $kategori->nama_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Barang</label>
                                                                <div class="col-sm-10">
                                                                    <select name="nama_barang" class="form-control" id="select_barang" required>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                         
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Terjual</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="0" name="stok" required id="stok">
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-info" id="analisa_btn">Analisa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="result1">

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
    <script>
        $('#select_kategori').change(function() {
            $.ajax({
                url: "<?= base_url() ?>dataset/get_barang/" + $(this).val(),
                type: 'GET',
                success: function(res) {
                    $('#select_barang').html(res)
                }
            })
        })
        $('#select_barang').change(function() {
            $.ajax({
                url: "<?= base_url() ?>dataset/get_tipe/" + $(this).val(),
                type: 'GET',
                success: function(res) {
                    $('#select_tipe').html(res)
                }
            })
        })

        function loadData() {
            $.ajax({
                url: "<?= base_url() ?>dataset/get_barang/" + $('#select_kategori').val(),
                type: 'GET',
                success: function(res) {
                    $('#select_barang').html(res)
                    $.ajax({
                        url: "<?= base_url() ?>dataset/get_tipe/" + $('#select_barang').val(),
                        type: 'GET',
                        success: function(res) {
                            $('#select_tipe').html(res)
                        }
                    })
                }
            })

        }

        window.onload = loadData()

        $('#analisa_form').submit(function(ev) {
            ev.preventDefault();
            var barang = $('#select_barang').val()
            var kategori = $('#select_kategori').val()
            var stok = $('#stok').val()
            var terjual = $('#terjual').val()

            var data = {
                barang: barang,
                kategori: kategori,
                stok: stok,
                terjual: terjual
            }

            $.ajax({
                url: '<?php echo base_url() ?>bayes',
                type: 'POST',
                data: data,
                cache: false,
                success: function(res) {
                    $('#result1').html(res)
                }
            })
        })
    </script>


</body>

</html>