<?php 
$nama = $this->session->userdata('user_logged')->nama; 
$page = $this->uri->segment(1);
?>

<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="<?= base_url() ?>assets/images/admin.png" alt="User-Profile-Image">
                <div class="user-details">
                    <span><?= $nama ;?></span>
                </div>
            </div>

           
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Main Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo $page=='dashboard' ? "active":"" ?>">
                <a href="<?php echo base_url() ?>dashboard" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?php echo $page=='dataset' ? "active":"" ?>">
                <a href="<?php echo base_url() ?>dataset" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-server"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Data Set</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?php echo $page=='analisa' ? "active":"" ?>">
                <a href="<?php echo base_url() ?>analisa" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-stats-up"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Analisa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>