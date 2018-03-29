<?php
    
    /* @var $this \yii\web\View */
    
    /* @var $content string */
    
    use app\assets\AppAsset;
    use app\modules\humancapital\models\Pegawai;
    use app\modules\system\models\User;
    use yii\helpers\Html;
    use yii\helpers\Url;
    
    $asset = AppAsset::register($this);
    $session = \Yii::$app->session;
    
    $pegawai = new Pegawai();
    $user = new User();
    
    if (!\Yii::$app->user->isGuest) {
        $user = User::findOne(\Yii::$app->user->getId());
        $pegawai->setAttributes(($user->getPegawai()->one() ?: $pegawai)->getAttributes());
    }
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title ?: Yii::$app->params['applicationTitle']) ?></title>
    
    <?php $this->head() ?>
</head>

<body class="nav-md">
<?php $this->beginBody() ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a class="site_title"><i class="fa fa-signing"></i>
                        <span><?= Html::encode($this->title ?: Yii::$app->params['applicationTitle']) ?></span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= $asset->baseUrl . '/images/user.png' ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $pegawai->nama ?: "User name here!" ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>System</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a>
                                    <i class="fa fa-institution"></i> Organization <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/identitas-perusahaan') ?>">Identitas Perusahaan</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/izin-usaha') ?>">Izin Usaha</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/pajak') ?>">Pajak</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/pemilik') ?>">Pemilik</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/pengurus') ?>">Pengurus</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/org/peralatan') ?>">Peralatan</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-cube"></i> Master <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/grade') ?>">Grade</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/hari-libur') ?>">Hari Libur</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/jabatan') ?>">Jabatan</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/jenis-izin-cuti') ?>">Jenis Izin Cuti</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/kontak') ?>">Kontak</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/kota') ?>">Kota</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/provinsi') ?>">Provinsi</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/unit-kerja') ?>">Unit Kerja</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/master/universitas') ?>">Universitas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-users"></i> User & Permission <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/system/user') ?>">User</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/system/role') ?>">Role</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/system/menu') ?>">Menu</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/config') ?>">
                                    <i class="fa fa-gear"></i> Setting
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Human Resource</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/humanresource/employee') ?>">
                                    <i class="fa fa-id-card"></i> Pegawai
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-leaf"></i> Izin & Cuti <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/humanresource/leave/create') ?>">Permohonan Baru</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/humanresource/leave/list') ?>">Daftar Permohonan</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(Yii::$app->getUrlManager()->baseUrl . '/humanresource/leave/approval-list') ?>">Persetujuan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Project</h3>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= \yii\helpers\Url::to(Yii::$app->getUrlManager()->baseUrl . 'system/auth/logout') ?>">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">1</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="<?= $asset->baseUrl . '/images/user.png' ?>" alt="Profile Image"/></span>
                                        <span>
                                  <span>John Smith</span>
                                  <span class="time">3 mins ago</span>
                                </span>
                                        <span class="message">
                                  Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-xs-12">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Copyright © 2018 Akhdani Reka Solusi
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<?php $this->endBody() ?>

<script>
    <?php
    if ($session->hasFlash('msg_success')){
    ?>
    new PNotify({
        title: 'Berhasil',
        text: "<?=$session->getFlash('msg_success')?>",
        type: 'success',
        styling: 'bootstrap3'
    });
    <?php
    }
    ?>
    
    <?php
    if ($session->hasFlash('msg_error')){
    ?>
    new PNotify({
        title: 'Ooops...',
        text: "<?=$session->getFlash('msg_error')?>",
        type: 'error',
        styling: 'bootstrap3'
    });
    <?php
    }
    ?>
</script>
</body>
</html>
<?php $this->endPage() ?>
