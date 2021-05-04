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
        <?php $this->renderSection('main') ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="text-center">
            <div class="copyright">
                <p class="text-white"> © 2021 Ganatech. All Rights Reserved</p>
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