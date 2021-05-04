<div id="tugas" class="tab-pane fade">
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Tugas Yang Diberikan</h4>
                    <div class="dropdown ml-auto">
                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
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
                            <li class="dropdown-item"><a href="#" data-toggle="modal"
                                    data-target="#tambahKegiatanTugas"><i class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Tugas Diberikan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tugas</th>
                                    <th>Catatan Tugas</th>
                                    <th>Tanggal Tugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kegiatan_tugas as $tugas) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $tugas['nama_tugas']; ?></td>
                                    <td><?= $tugas['kategori_tugas']; ?></td>
                                    <td> <?= date('d F Y', strtotime($tugas['tgl_tugas'])) ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" data-toggle="modal"
                                                data-target="#ubahKegiatanTugas-<?= $tugas['id_kegiatan_tugas']; ?>"><button
                                                    type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Ubah Kegiatan Tugas"><i
                                                        class="fa fa-pencil"></i></button></a>
                                            <!-- Ubah Mahasiswa -->
                                            <div class="modal fade"
                                                id="ubahKegiatanTugas-<?= $tugas['id_kegiatan_tugas']; ?>">
                                                <div class=" modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Kegiatan Tugas</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <?= csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Nama
                                                                        Tugas</label>
                                                                    <input type="text" class="form-control" required
                                                                        name="nama_tugas"
                                                                        value="<?= (old('nama_tugas')) ? old('nama_tugas') : $tugas['nama_tugas']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Catatan
                                                                        Tugas</label>
                                                                    <textarea name="kategori_tugas" id="kategori_tugas"
                                                                        class="form-control"
                                                                        placeholder="Catatan Tugas (Opsional)" cols="30"
                                                                        rows="10"><?= (old('kategori_tugas')) ? old('kategori_tugas') : $tugas['kategori_tugas']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Tanggal
                                                                        Tugas</label>
                                                                    <input type="date" class="form-control" required
                                                                        name="tgl_tugas"
                                                                        value="<?= (old('tgl_tugas')) ? old('tgl_tugas') : $tugas['tgl_tugas']; ?>">
                                                                </div>
                                                                <input type="hidden" name="id_kegiatan_tugas"
                                                                    value="<?= $tugas['id_kegiatan_tugas']; ?>">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        value="submit_ubah_kegiatan_tugas"
                                                                        name="submit_ubah_kegiatan_tugas"
                                                                        class="btn btn-primary">UNGGAH</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= base_url(); ?>/hapus-kegiatan-tugas/<?= $tugas['id_kegiatan_tugas']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Hapus Kegiatan Tugas"></i></a>
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
    <?php if (!empty($kegiatan_tugas)) : ?>
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Tugas Mahasiswa</h4>
                    <div class="dropdown ml-auto">
                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
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
                            <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#tambahNilaiTugas"><i
                                        class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Nilai Tugas</a></li>
                            <?php if (!empty($mahasiswa)) : ?>
                            <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2"><a
                                        href="<?= base_url(); ?>/hapus-seluruh-nilai-tugas/<?= $d_kelas[0]['id_kelas']; ?>"
                                        class="tombol-hapus"></i>
                                Kosongkan Seluruh Nilai</a></li>
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
                                    <th>Detail Nilai</th>
                                    <th>Rata-Rata</th>
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
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modalLihatNilaiTugas-<?= $m['id_mahasiswa']; ?>"><button
                                                type="button" class="btn btn-primary btn-sm">Detail
                                                Nilai</button></a>
                                    </td>
                                    <!-- Ubah,Lihat Nilai -->
                                    <div class="modal fade" id="modalLihatNilaiTugas-<?= $m['id_mahasiswa']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat Nilai Tugas</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nama
                                                                Mahasiswa</label>
                                                            <input type="text" class="form-control" disabled
                                                                value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                        </div>

                                                        <?php foreach ($nilai_tugas as $nilai) : ?>
                                                        <?php if ($nilai['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nilai
                                                                <?= $nilai['nama_tugas']; ?>
                                                            </label>
                                                            <input type="text" class="form-control" disabled
                                                                value="<?= $nilai['nilai_tugas']; ?>">
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="form-group">
                                                            <button type="button" data-dismiss="modal"
                                                                class="btn btn-primary">TUTUP</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah,Lihat Nilai -->
                                    <?php if (empty($m['nilai_tugas'])) : ?>
                                    <td><strong>Nilai Tidak Ada</strong></td>
                                    <?php else : ?>
                                    <td><strong><?= $m['nilai_tugas']; ?></strong></td>
                                    <?php endif; ?>
                                    <?php
                                            if ($m['nilai_tugas'] >= 85 && $m['nilai_tugas'] <= 100) {
                                                $skala = "4,00";
                                                $huruf = "A";
                                            } else if ($m['nilai_tugas'] >= 81 && $m['nilai_tugas'] <= 84) {
                                                $skala = "3,75";
                                                $huruf = "A-";
                                            } else if ($m['nilai_tugas'] >= 77 && $m['nilai_tugas'] <= 80) {
                                                $skala = "3,25";
                                                $huruf = "B+";
                                            } else if ($m['nilai_tugas'] >= 73 && $m['nilai_tugas'] <= 76) {
                                                $skala = "3,00";
                                                $huruf = "B";
                                            } else if ($m['nilai_tugas'] >= 69 && $m['nilai_tugas'] <= 72) {
                                                $skala = "2,75";
                                                $huruf = "B-";
                                            } else if ($m['nilai_tugas'] >= 65 && $m['nilai_tugas'] <= 68) {
                                                $skala = "2,50";
                                                $huruf = "C+";
                                            } else if ($m['nilai_tugas'] >= 61 && $m['nilai_tugas'] <= 64) {
                                                $skala = "2,00";
                                                $huruf = "C";
                                            } else if ($m['nilai_tugas'] >= 40 && $m['nilai_tugas'] <= 60) {
                                                $skala = "1,00";
                                                $huruf = "D";
                                            } else {
                                                $skala = "0,00";
                                                $huruf = "E";
                                            }

                                            ?>
                                    <td><?= $skala; ?></td>
                                    <td><?= $huruf; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="<?= base_url(); ?>/hapus-nilai-tugas/<?= $m['id_mahasiswa']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Kosongkan Nilai Mahasiswa"></i></a>
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
    <?php endif; ?>
</div>



<!-- Modal -->
<!-- Tambah Kegiatan Tugas-->
<div class="modal fade" id="tambahKegiatanTugas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Tugas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Kegiatan Tugas</label>
                        <input type="text" class="form-control" required name="nama_tugas"
                            value="<?= old('nama_tugas'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Catatan Tugas</label>
                        <textarea name="kategori_tugas" id="kategori_tugas" class="form-control"
                            placeholder="Catatan Tugas (Opsional)" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Tanggal Tugas</label>
                        <input type="date" class="form-control" required name="tgl_tugas"
                            value="<?= old('tgl_tugas'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_kegiatan_tugas" name="submit_kegiatan_tugas"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Kegiatan Tugas-->

<!-- Tambah Nilai -->
<div class="modal fade" id="tambahNilaiTugas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai Tugas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Kategori Tugas</label>
                        <select class="form-control default-select" required name="kategori_tugas">
                            <?php foreach ($kegiatan_tugas as $tugas) : ?>
                            <option value="<?= $tugas['id_kegiatan_tugas']; ?>">
                                <?= $tugas['nama_tugas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Mahasiswa</label>
                        <select class="form-control default-select" required name="mahasiswa">
                            <?php foreach ($mahasiswa as $mhs) : ?>
                            <option value="<?= $mhs['id_mahasiswa']; ?>"><?= $mhs['nim_mahasiswa']; ?> -
                                <?= $mhs['nama_mahasiswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Nilai Tugas</label>
                        <input type="number" min="0" step="0.01" max="100" class="form-control" required
                            name="nilai_tugas" value="<?= old('nilai_tugas'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_nilai_tugas" name="submit_nilai_tugas"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Nilai -->