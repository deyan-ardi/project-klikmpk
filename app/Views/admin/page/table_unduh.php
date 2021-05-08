<div id="request" class="tab-pane">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Status Permintaan</h4>
                    </div>
                    <div class="card-body">
                        <?php if (in_groups('admin')) : ?>
                        <?php if (!empty($data_unduh_user)) : ?>
                        <?php foreach ($data_unduh_user as $d) : ?>
                        <?php if ($d['status_unduh'] == 0) : ?>
                        <div class="alert alert-info" role="alert">
                            <div class="row col-lg-12">
                                <a href="<?= base_url(); ?>/batalkan-pengajuan/<?= $d['id_request']; ?>"
                                    class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"
                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Pengajuan"></i></a>
                                <a href="<?= base_url(); ?>/terima-pengajuan/<?= $d['id_request']; ?>"
                                    class="btn btn-success shadow btn-xs sharp ml-2"><i class="fa fa-check text-white"
                                        data-toggle="tooltip" data-placement="bottom" title="Terima Pengajuan"></i></a>
                            </div>
                            <h4 class="mt-3">#<?= ucWords($d['kode_soal']); ?> - Mata Kuliah
                                <?= ucWords($d['mata_kuliah']); ?>
                            </h4>
                            <h6>Pengaju : <?= ucWords($d['username']); ?></h6>
                            <?php if (!empty($d['pesan_pengajuan'])) : ?>
                            <h6>Deskripsi : <?= ucWords($d['pesan_pengajuan']); ?></h6>
                            <?php else : ?>
                            <h6>Deskripsi : <em>Deskripsi Kosong</em></h6>
                            <?php endif; ?>
                            <h6>Kategori Soal : <?= $d['kategori_soal']; ?></h6>
                            <h6>Tanggal : <?= date('d F Y H:i:s', strtotime($d['created_at'])); ?> WITA</h6>
                            <p>Status : <em> Menunggu Konfirmasi</em></p>
                        </div>
                        <?php else : ?>

                        <div class="alert alert-success" role="alert">
                            <div class="row col-lg-12">
                                <a href="<?= base_url(); ?>/batalkan-pengajuan/<?= $d['id_request']; ?>"
                                    class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"
                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Pengajuan"></i></a>
                                <a href="<?= base_url(); ?>/batalkan-terima/<?= $d['id_request']; ?>"
                                    class="btn btn-warning shadow btn-xs sharp ml-2"><i
                                        class="fa fa-arrow-left text-white" data-toggle="tooltip"
                                        data-placement="bottom" title="Batalkan Terima"></i></a>
                            </div>
                            <h4 class="mt-3">#<?= ucWords($d['kode_soal']); ?> - Mata Kuliah
                                <?= ucWords($d['mata_kuliah']); ?>
                            </h4>
                            <h6>Pengaju : <?= ucWords($d['username']); ?></h6>
                            <?php if (!empty($d['pesan_pengajuan'])) : ?>
                            <h6>Deskripsi : <?= ucWords($d['pesan_pengajuan']); ?></h6>
                            <?php else : ?>
                            <h6>Deskripsi : <em>Deskripsi Kosong</em></h6>
                            <?php endif; ?>
                            <h6>Kategori Soal : <?= $d['kategori_soal']; ?></h6>
                            <h6>Tanggal : <?= date('d F Y H:i:s', strtotime($d['created_at'])); ?> WITA</h6>
                            <p>Status : <em> Unduhan Diterima</em></p>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="alert alert-info" role="alert">
                            <p>Belum Ada Pengajuan Dari Member</p>
                        </div>
                        <?php endif; ?>
                        <?php else : ?>
                        <?php if (!empty($data_unduh_user)) : ?>
                        <?php foreach ($data_unduh_user as $d) : ?>
                        <?php if ($d['status_unduh'] == 0) : ?>
                        <div class="alert alert-info" role="alert">
                            <a href="<?= base_url(); ?>/batalkan-pengajuan/<?= $d['id_request']; ?>"
                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"
                                    data-toggle="tooltip" data-placement="bottom" title="Batalkan Pengajuan"></i></a>
                            <h4 class="mt-3">#<?= ucWords($d['kode_soal']); ?> - Mata Kuliah
                                <?= ucWords($d['mata_kuliah']); ?>
                            </h4>
                            <?php if (!empty($d['pesan_pengajuan'])) : ?>
                            <h6>Deskripsi : <?= ucWords($d['pesan_pengajuan']); ?></h6>
                            <?php else : ?>
                            <h6>Deskripsi : <em>Deskripsi Kosong</em></h6>
                            <?php endif; ?>
                            <h6>Kategori Soal : <?= $d['kategori_soal']; ?></h6>
                            <h6>Tanggal : <?= date('d F Y H:i:s', strtotime($d['created_at'])); ?> WITA</h6>
                            <p>Status : <em> Menunggu Konfirmasi</em></p>
                        </div>
                        <?php else : ?>
                        <div class="alert alert-success" role="alert">
                            <a href="<?= base_url(); ?>/batalkan-pengajuan/<?= $d['id_request']; ?>"
                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"
                                    data-toggle="tooltip" data-placement="bottom" title="Batalkan Pengajuan"></i></a>
                            <h4 class="mt-3">#<?= ucWords($d['kode_soal']); ?> - Mata Kuliah
                                <?= ucWords($d['mata_kuliah']); ?>
                            </h4>
                            <?php if (!empty($d['pesan_pengajuan'])) : ?>
                            <h6>Deskripsi : <?= ucWords($d['pesan_pengajuan']); ?></h6>
                            <?php else : ?>
                            <h6>Deskripsi : <em>Deskripsi Kosong</em></h6>
                            <h6>Kategori Soal : <?= $d['kategori_soal']; ?></h6>
                            <h6>Tanggal : <?= date('d F Y H:i:s', strtotime($d['created_at'])); ?> WITA</h6>
                            <?php endif; ?>
                            <p>Status : <em> Pengajuan Terkonfirmasi</em></p>
                            <a href="<?= base_url(); ?>/data_soal/<?= $d['file_pdf']; ?>" class="btn btn-primary">Unduh
                                Soal</a>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="alert alert-info" role="alert">
                            <p>Belum Ada Pengajuan, Silahkan Ajukan Unduhan Pada Bagian <a href="#bank"
                                    data-toggle="tab" class="text-primary">Daftar Soal</a>
                            </p>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>