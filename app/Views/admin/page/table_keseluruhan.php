<div id="keseluruhan" class="tab-pane fade show active">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nilai Keseluruhan</h4>
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
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#tambahManual"><i
                                            class="fa fa-plus text-primary mr-2"></i>
                                        Tambah Mahasiswa</a></li>
                                <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#importAll"><i
                                            class="fa fa-upload text-primary mr-2"></i>
                                        Import Data Mahasiswa</a></li>

                                <?php if (!empty($mahasiswa)) : ?>
                                <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2"><a
                                            href="<?= base_url(); ?>/hapus-seluruh-mahasiswa/<?= $d_kelas[0]['id_kelas']; ?>"
                                            class="tombol-hapus"></i>
                                    Hapus Seluruh Mahasiswa</a></li>
                                <li class="dropdown-item"><a
                                        href="<?= base_url(); ?>/export-excel/<?= $d_kelas[0]['id_kelas']; ?>"><i
                                            class="fa fa-download text-primary mr-2"></i>
                                        Unduh Seluruh Data</a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nim Mahasiswa</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nilai Sikap</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Total</th>
                                        <th>Nilai Skala</th>
                                        <th>Nilai Huruf</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($mahasiswa as $m) :
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $m['nim_mahasiswa']; ?></td>
                                        <td><?= $m['nama_mahasiswa']; ?></td>
                                        <?php if (empty($m['nilai_sikap'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_sikap']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_uts'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_uts']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_uas'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_uas']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_akhir'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['nilai_akhir']; ?></strong></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['skala'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['skala']; ?></strong></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['karakter'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['karakter']; ?></strong></td>
                                        <?php endif; ?>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" data-toggle="modal"
                                                    data-target="#ubahMahasiswa-<?= $m['id_mahasiswa']; ?>"><button
                                                        type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Ubah Data Mahasiswa"><i
                                                            class="fa fa-pencil"></i></button></a>
                                                <!-- Ubah Mahasiswa -->
                                                <div class="modal fade" id="ubahMahasiswa-<?= $m['id_mahasiswa']; ?>">
                                                    <div class=" modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Data Mahasiswa</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST">
                                                                    <?= csrf_field(); ?>
                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Nim
                                                                            Mahasiswa</label>
                                                                        <input type="number" placeholder="XXXXXXXXXX"
                                                                            maxlength="10" min="0" class="form-control"
                                                                            required name="nim"
                                                                            value="<?= (old('nim')) ? old('nim') : $m['nim_mahasiswa']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Nama
                                                                            Mahasiswa</label>
                                                                        <input type="text" placeholder="I Kadek XXXXX"
                                                                            class="form-control" required
                                                                            name="nama_mahasiswa"
                                                                            value="<?= (old('nama_mahasiswa')) ? old('nama_mahasiswa') : $m['nama_mahasiswa']; ?>">
                                                                    </div>
                                                                    <input type="hidden" name="id_mahasiswa"
                                                                        value="<?= $m['id_mahasiswa']; ?>">
                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                            value="submit_ubah_mahasiswa"
                                                                            name="submit_ubah_mahasiswa"
                                                                            class="btn btn-primary">UNGGAH</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Ubah Mahasiswa -->
                                                <a href="<?= base_url(); ?>/hapus-mahasiswa/<?= $m['id_mahasiswa']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                        class="fa fa-trash" data-toggle="tooltip"
                                                        data-placement="bottom" title="Hapus Data Mahasiswa"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<!-- Tambah Mahasiswa -->
<div class="modal fade" id="tambahManual">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Nim Mahasiswa</label>
                        <input type="number" placeholder="XXXXXXXXXX" maxlength="10" min="0" class="form-control"
                            required name="nim" value="<?= old('nim'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Mahasiswa</label>
                        <input type="text" placeholder="I Kadek XXXXX" class="form-control" required
                            name="nama_mahasiswa" value="<?= old('nama_mahasiswa'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_mahasiswa" name="submit_mahasiswa"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Mahasiswa -->

<!-- Tambah Excel -->
<div class="modal fade" id="importAll">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Excel Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Unggah File Excel (.xls, .xlsx)*</label>
                        <input type="file" class="form-control" accept=".xls,.xlsx" required name="file_excel">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">*Silahkan unduh format isi dari <a
                                href="<?= base_url(); ?>/upload/Format_Excel.xlsx" class="text-primary">File Excel</a>
                            yang dapat
                            diunggah ke sistem</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_excel_mahasiswa" name="submit_excel_mahasiswa"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Excel -->