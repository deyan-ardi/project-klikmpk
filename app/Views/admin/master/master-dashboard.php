<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from zenix.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 12:34:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KlikMPK - <?= $title; ?></title>
    <?= $this->include('admin/master/css') ?>

</head>

<body>
    <div class="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil') ?>"></div>
    <div class="gagal" data-gagal="<?= session()->getFlashdata('gagal') ?>"></div>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= base_url(); ?>" class="brand-logo">
                <img src="<?= base_url(); ?>/assets/klik-icon.png" width="50" class="logo-abbr" alt="">
                <h3 class="brand-title">KlikMPK</h3>

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <?php if (!empty(user()->foto_profil)) : ?>
                                    <img src="<?= base_url(); ?>/profil_image/<?= user()->foto_profil; ?>" width="20"
                                        alt="" />
                                    <?php else : ?>
                                    <img src="<?= base_url(); ?>/profil_image/default.jpg" width="20" alt="" />
                                    <?php endif; ?>
                                    <div class="header-info">
                                        <span><?= ucWords(user()->username); ?></span>
                                        <small>Dosen/Guru Pendidik</small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url(); ?>/pengaturan-profil" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profil </span>
                                    </a>
                                    <a href="<?= base_url(); ?>/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Keluar </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="main-profile">
                    <?php if (!empty(user()->foto_profil)) : ?>
                    <img src="<?= base_url(); ?>/profil_image/<?= user()->foto_profil; ?>" alt="" />
                    <?php else : ?>
                    <img src="<?= base_url(); ?>/profil_image/default.jpg" alt="" />
                    <?php endif; ?>
                    <a href="<?= base_url(); ?>/pengaturan-profil"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hai,</span>
                        <?= ucWords(user()->username); ?></h5>
                    <p class="mb-0 fs-14 font-w400"><?= user()->email; ?></p>
                </div>
                <ul class="metismenu" id="menu">
                    <li><a href="<?= base_url(); ?>/" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-077-menu-1"></i>
                            <span class="nav-text">Kelas Saya</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (!empty($kelas)) : ?>
                            <?php foreach ($kelas as $k) : ?>
                            <li><a
                                    href="<?= base_url(); ?>/masuk-kelas/<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></a>
                            </li>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <li><a href="#">Belum Ada Kelas</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?= base_url(); ?>/informasi-website" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Informasi Website</span>
                        </a>
                    </li>
                </ul>
                <div class="copyright">
                    <p> © 2021 Ganatech. All Rights Reserved</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?php $this->renderSection('main') ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p> © 2021 Ganatech. All Rights Reserved</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?= $this->include('admin/master/javascript') ?>

</body>

</html>