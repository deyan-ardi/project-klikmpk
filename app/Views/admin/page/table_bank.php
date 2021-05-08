<div id="keseluruhan" class="tab-pane fade show active">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Bank Soal</h4>
                        <?php if (in_groups('admin')) : ?>
                        <div class="dropdown ml-auto">
                            <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24">
                                        </rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                        </circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#tambahSoal"><i
                                            class="fa fa-plus text-primary mr-2"></i>
                                        Tambah Soal</a></li>
                                <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2"><a
                                            href="<?= base_url(); ?>/hapus-seluruh-soal" class="tombol-hapus"></i>
                                    Hapus Seluruh Soal</a></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example3" class="display col-lg-12">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori Soal</th>
                                        <th>Mata Kuliah</th>
                                        <th>Deskripsi Soal</th>
                                        <th>Unduh Soal *</th>
                                        <th>Upload Pada</th>
                                        <th>Diunggah Oleh</th>
                                        <?php if (in_groups('admin')) : ?>
                                        <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data_soal as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= ucWords($d['kategori_soal']); ?></td>
                                        <td><?= ucWords($d['mata_kuliah']); ?></td>
                                        <td><?= ucWords($d['deskripsi_soal']); ?></td>
                                        <?php if (in_groups('admin')) : ?>
                                        <td><a href="<?= base_url(); ?>/data_soal/<?= $d['file_pdf']; ?>"
                                                class="btn btn-primary">Unduh</a></td>
                                        <?php else : ?>
                                        <?php if (!empty($data_unduh)) : ?>
                                        <?php foreach ($data_unduh as $u) : ?>
                                        <?php if ($u['id_user'] == user()->id && $u['id_bank_soal'] == $d['id_bank_soal'] && $u['status_unduh'] == 0) : ?>
                                        <td><a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ajukanUnduhan">
                                                Ajukan</a></td>
                                        <?php elseif ($u['id_user'] == user()->id && $u['id_bank_soal'] == $d['id_bank_soal'] && $u['status_unduh'] == 1) : ?>
                                        <td><a href="#request" data-toggle="tab" class="btn btn-primary">
                                                Permintaan</a></td>
                                        <?php else : ?>
                                        <td><a href="<?= base_url(); ?>/data_soal/<?= $d['file_pdf']; ?>"
                                                class="btn btn-primary">Unduh</a></td>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <td><a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ajukanUnduhan-<?= $d['id_bank_soal']; ?>">
                                                Ajukan</a></td>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                        <!-- Ajukan Unduhan-->
                                        <div class="modal fade" id="ajukanUnduhan-<?= $d['id_bank_soal']; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ajukan Permohonan Unduh Soal</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST">
                                                            <?= csrf_field(); ?>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Kode Soal</label>
                                                                <select name="id_soal" required id="id_soal"
                                                                    class="form-control default-select">
                                                                    <option value="<?= $d['id_bank_soal']; ?>" selected>
                                                                        <?= ucWords($d['kategori_soal']); ?> -
                                                                        <?= ucWords($d['mata_kuliah']); ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Diajukan
                                                                    Oleh</label>
                                                                <select name="diajukan" required id="diajukan"
                                                                    class="form-control default-select">
                                                                    <option value="<?= user()->id; ?>" selected>
                                                                        <?= ucWords(user()->username) ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Pesan Untuk
                                                                    Admin</label>
                                                                <textarea name="pesan"
                                                                    placeholder="Masukkan Pesan Untuk Admin (Opsional)"
                                                                    class="form-control" id="pesan" cols="30"
                                                                    rows="10"></textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" value="submit_ajukan_unduh"
                                                                    name="submit_ajukan_unduh"
                                                                    class="btn btn-primary">Ajukan Permohonan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Ajukan Unduhan-->
                                        <td><?= date('d F Y', strtotime($d['created_at'])); ?></td>
                                        <td><?= ucWords($d['created_by']); ?></td>
                                        <?php if (in_groups('admin')) : ?>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?= base_url(); ?>/hapus-soal/<?= $d['id_bank_soal']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                        class="fa fa-trash" data-toggle="tooltip"
                                                        data-placement="bottom" title="Hapus Data Buku"></i></a>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="mt-3">*Anda Baru Dapat Mengunduh Soal Jika Disetujui Oleh Admin/Author Soal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Mahasiswa -->
<div class="modal fade" id="tambahSoal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Soal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Kategori Soal</label>
                        <select name="kategori" required id="kategori" class="form-control default-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Essay">Soal Essay</option>
                            <option value="Pilihan Ganda">Soal Pilihan Ganda</option>
                            <option value="Essay dan Pilihan Ganda">Soal Essay dan Pilihan Ganda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Mata Kuliah</label>
                        <input type="text" placeholder="Mata Kuliah" class="form-control" required name="matkul"
                            value="<?= old('matkul'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Deskripsi</label>
                        <textarea name="deskripsi" required id="deskripsi" placeholder="Deskripsi" class="form-control"
                            cols="30" rows="10" value="<?= old('deskripsi'); ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">File</label>
                        <input type="file" accept=".pdf" name="file" required class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_file_soal" name="submit_file_soal"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Mahasiswa -->