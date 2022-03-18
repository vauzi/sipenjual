<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bayes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        if ($this->session->userdata['user_logged'] == TRUE) {

            $this->load->model('dataset_model');
        } else {
            redirect('login');
        }
    }


    function sumLaku()
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->status == "LAKU") {
                $t += 1;
            }
        }

        return $t;
    }

    // Tidak Laku
    function sumTidakLaku()
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->status == "TIDAK LAKU") {
                $t += 1;
            }
        }
        return $t;
    }

    // Total Data
    function sumData()
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);
        return count($hasil);
    }




    /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
    // 
    function probBarang($barang, $status)
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->nama_barang == $barang && $hasil->status == $status) {
                $t += 1;
            } else if ($hasil->nama_barang == $barang && $hasil->status == $status) {
                $t += 1;
            }
        }
        return $t;
    }

    function probStok($stok, $status)
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->stok > 30 && $hasil->status == $status) {
                $t += 1;
            } else if ($hasil->stok > 30 && $hasil->status == $status) {
                $t += 1;
            }
        }
        return $t;
    }

    function probKategori($kategori, $status)
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->kategori == $kategori && $hasil->status == $status) {
                $t += 1;
            } else if ($hasil->kategori == $kategori && $hasil->status == $status) {
                $t += 1;
            }
        }
        return $t;
    }


    function probTerjual($terjual, $status)
    {
        $hasil = $this->dataset_model->list_dataset()->result();
        // $data = json_encode($dataRaw);
        // $hasil = json_decode($data, true);

        $t = 0;
        foreach ($hasil as $hasil) {
            if ($hasil->terjual >=30 && $hasil->status == $status) {
                $t += 1;
            } else if ($hasil->terjual >=30 && $hasil->status == $status) {
                $t += 1;
            }
        }
        return $t;
    }




    /*=================================================================
  keterangan parameter :
  $sL   : jumlah data yang  laku ( sumLAKU )
  $sTL   : jumlah data yang  tidak laku ( sumTidakLaku )
  $sD   : jumlah data pada dataset ( sumData )
  $pB   : jumlah probabilitas barang ( probBarang )
  $pS   : jumlah probabilitas stok ( probStok )
  ==================================================================*/

    function hasilLaku($sL = 0, $sD = 0, $pB = 0, $pS = 0)
    {
        $paTrue = $sL / $sD;
        $p1 = $pB / $sL;
        $p2 = $pS / $sL;
        $hsl = $paTrue * $p1 * $p2;
        return $hsl;
    }

    function hasilTidakLaku($sTL = 0, $sD = 0, $pB = 0, $pS = 0)
    {
        $paFalse = $sTL / $sD;
        $p1 = $pB / $sTL;
        $p2 = $pS / $sTL;
        $hsl = $paFalse * $p1 * $p2;
        return $hsl;
    }

    // Get Status Laku/Tidak Laku
    function perbandingan($pATrue, $pAFalse)
    {
        if ($pATrue > $pAFalse) {
            $stt = "LAKU";
            $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
            $diterima = 100 - $hitung;
        } elseif ($pAFalse > $pATrue) {
            $stt = "TIDAK LAKU";
            $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
            $diterima = 100 - $hitung;
        }

        $hsl = array($stt, $hitung, $diterima);
        return $hsl;
    }

    public function index()
    {
        $post = $this->input->post();
        $a1 = $post['barang'];
        $a2 = $post['stok'];
        $kat = $post['kategori'];


        // Jumlah
        $jumLaku = $this->sumLaku(); // Jumlah Laku
        $jumTidakLaku = $this->sumTidakLaku(); // Jumlah Tidak Laku
        $jumData = $this->sumData(); // Jumlah Data

        // Laku
        $stok = $this->probTerjual($a2, 'LAKU');
        $barang = $this->probBarang($a1, 'LAKU');

        // Tidak Laku
        $stok1 = $this->probTerjual($a2, 'TIDAK LAKU');
        $barang1 = $this->probBarang($a1, 'TIDAK LAKU');


        // Hasil
        $paL = $this->hasilLaku($jumLaku, $jumData, $barang, $stok);
        $paTL = $this->hasilTidakLaku($jumTidakLaku, $jumData, $barang1, $stok1);

        $result = $this->perbandingan($paL, $paTL);

         $result_text = "$a1 Termasuk Dalam Klasifikasi $result[0]";
        //  $kategori,$nama_barang,$tipe_barang,$laris,$tidak_laris

        $this->dataset_model->add_result($kat,$a1,$result[1],$result[2],$result[0]);

?>
        <div class="card">
            <div class="card-header">
                <h3>Hasil</h3>
            </div>
            <div class="card-body">
                <h3>Input Data</h3>
                <table class="col-sm-3 table">
                    <tr>
                        <td>Barang</td>
                        <td>: <?= $a1 ?></td>
                    </tr>
                    <tr>
                        <td>Terjual</td>
                        <td>: <?= $a2 ?></td>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered my-3 ">
                        <thead>
                            <tr class="table-primary" style="color: #fff;">
                                <td>Jumlah Laku</td>
                                <td>Jumlah Tidak Laku</td>
                                <td>Jumlah Total Data</td>
                            </tr>

                        </thead>
                        <tr>
                            <td><?= $jumLaku ?></td>
                            <td><?= $jumTidakLaku ?></td>
                            <td><?= $jumData ?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="table-primary" style="color: #fff;">
                                <td></td>
                                <td>Laku</td>
                                <td>Tidak Laku</td>
                            </tr>
                        </thead>
                        <tr>
                            <td>Barang</td>
                            <td><?= $barang ?> / <?= $jumLaku ?></td>
                            <td><?= $barang1 ?> / <?= $jumTidakLaku ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><?= $stok ?> / <?= $jumLaku ?></td>
                            <td><?= $stok1 ?> / <?= $jumLaku ?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="table-primary" style="color: #fff;">
                                <td>Persentasi Laku</td>
                                <td>Persentasi Tidak Laku</td>
                            </tr>
                        </thead>
                        <tr>
                            <td><?= round($result[1]) ?>% </td>
                            <td><?= round($result[2]) ?>%</td>
                        </tr>
                    </table>
                </div>
                <?php
                if ($result[0] == "LAKU") {
                ?>

                    <h3>Persentasi <span class='badge badge-success' style='padding:10px'><b>LAKU</b></span> Lebih Besar Dari Pada Persentasi TIDAK LAKU</h3>
                    <br>
                    <div>
                        <h3>Kesimpulan :</h3>
                        <h5><?= $a1 ?> Termasuk Dalam Klasifikasi <?= $result[0]?> </h5>
                    </div>
                <?php
                } else if($result[0]=='TIDAK LAKU'){
                ?>
                    <h3>Persentasi <span class='badge badge-danger' style='padding:10px'><b>TIDAK LAKU</b></span> Lebih Besar Dari Pada Persentasi LAKU</h3>
                    <br>
                    <div>
                        <h3>Kesimpulan :</h3>
                        <h5><?= $a1 ?> Termasuk Dalam Klasifikasi <?= $result[0]?> </h5>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
<?php
    }
}
