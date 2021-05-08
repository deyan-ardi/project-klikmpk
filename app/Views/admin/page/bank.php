<?php $this->extend('admin/master/master-dashboard') ?>
<?php $this->section('main') ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hai, <?= ucWords(user()->username); ?></h4>
                    <p class="mb-0">Ingin melakukan apa hari ini?</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">KlikMPK</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bank Soal</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- alert -->
                <?php if ($validation->getError('sampul')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->getError('sampul'); ?>
                </div>
                <?php endif; ?>

                <?php if ($validation->getErrors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors(); ?>
                </div>
                <?php endif; ?>
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <img src="<?= base_url(); ?>/sampul_image/bank-soal.jpg" class="cover-photo"></img>

                        </div>
                        <div class="profile-info">
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Diunggah Oleh Kadek Wirahyuni</h4>
                                    <?php if (!empty($data_soal)) : ?>
                                    <p>Update Terakhir Tanggal
                                        <?= date('d F Y', strtotime($data_soal[count($data_soal) - 1]['created_at'])); ?>
                                    </p>
                                    <?php else : ?>
                                    <p>Belum Ada Data </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#bank" data-toggle="tab"
                                            class="nav-link active show">Daftar Soal</a>
                                    </li>
                                    <li class="nav-item"><a href="#request" data-toggle="tab" class="nav-link">Status
                                            Permintaan</a>
                                    </li>
                                    <li class="nav-item"><a href="#hubungi" data-toggle="tab" class="nav-link">Hubungi
                                            Saya</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <?= $this->include('admin/page/table_bank'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php $this->endSection() ?>