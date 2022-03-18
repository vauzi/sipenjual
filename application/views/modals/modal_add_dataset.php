<div class="modal fade" tabindex="-1" role="dialog" id="add_dataset">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dataset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url() ?>dataset/tambah_dataset">
                <div class="modal-body">
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
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="0" name="stok" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Terjual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="0" name="terjual" required>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $('#select_kategori').change(function(){
        $.ajax({
            url:"<?=base_url()?>dataset/get_barang/"+$(this).val(),
            type:'GET',
            success:function(res){
                $('#select_barang').html(res)
                console.log(res)
            }
        })
    })

    function loadData(){
        $.ajax({
            url:"<?=base_url()?>dataset/get_barang/"+$('#select_kategori').val(),
            type:'GET',
            success:function(res){
                $('#select_barang').html(res)
            }
        })
    }

    window.onload =loadData()
</script>