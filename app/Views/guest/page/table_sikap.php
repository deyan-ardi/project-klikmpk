<?php if ($d_kelas[0]['n_sikap'] == 1) : ?>
<div id="sikap" class="tab-pane fade show active">
    <?php else : ?>
    <div id="sikap" class="tab-pane">
        <?php endif; ?>
        <div class="pt-2 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nilai Sikap dan Partisipasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display col-lg-12">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nim Mahasiswa</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Detail Nilai Sikap</th>
                                        <th>Detail Nilai Partisipasi</th>
                                        <th>Nilai Akhir</th>
                                        <th>Nilai Skala</th>
                                        <th>Nilai Huruf</th>
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
                                                data-target="#modalLihatSikap-<?= $m['id_mahasiswa']; ?>"><button
                                                    type="button" class="btn btn-primary btn-sm">
                                                    Nilai Sikap</button></a>
                                        </td>
                                        <!-- Ubah,Lihat Nilai -->
                                        <div class="modal fade" id="modalLihatSikap-<?= $m['id_mahasiswa']; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Lihat Nilai Sikap</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Nama
                                                                    Mahasiswa</label>
                                                                <input type="text" class="form-control" disabled
                                                                    value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                            </div>
                                                            <?php foreach ($nilai_sikap as $sikap) : ?>
                                                            <?php if ($sikap['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Santun</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_santun']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Displin</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_disiplin']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Berani</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_berani']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Rata-Rata
                                                                    Nilai</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['hasil_nilai_sikap']; ?>">
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
                                        <td><a href="#" data-toggle="modal"
                                                data-target="#modalLihatPartisipasi-<?= $m['id_mahasiswa']; ?>"><button
                                                    type="button" class="btn btn-primary btn-sm">
                                                    Nilai Partisipasi</button></a>
                                        </td>
                                        <!-- Ubah,Lihat Nilai -->
                                        <div class="modal fade" id="modalLihatPartisipasi-<?= $m['id_mahasiswa']; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Lihat Nilai Partisipasi</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Nama
                                                                    Mahasiswa</label>
                                                                <input type="text" class="form-control" disabled
                                                                    value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                            </div>
                                                            <?php foreach ($nilai_sikap as $sikap) : ?>
                                                            <?php if ($sikap['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Kehadiran</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_kehadiran']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Kepatuhan</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_kepatuhan']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Keaktifan</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['nilai_keaktifan']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black font-w500">Rata-Rata
                                                                    Nilai</label>
                                                                <input type="number" step="0.01" disabled
                                                                    class="form-control"
                                                                    value="<?= $sikap['hasil_nilai_partisipasi']; ?>">
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
                                        <?php if (empty($m['nilai_sikap'])) : ?>
                                        <td><strong>Nilai Tidak Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['nilai_sikap']; ?></strong></td>
                                        <?php endif; ?>
                                        <?php
                                            if ($m['nilai_sikap'] >= 85 && $m['nilai_sikap'] <= 100) {
                                                $skala = "4,00";
                                                $huruf = "A";
                                            } else if ($m['nilai_sikap'] >= 81 && $m['nilai_sikap'] <= 84) {
                                                $skala = "3,75";
                                                $huruf = "A-";
                                            } else if ($m['nilai_sikap'] >= 77 && $m['nilai_sikap'] <= 80) {
                                                $skala = "3,25";
                                                $huruf = "B+";
                                            } else if ($m['nilai_sikap'] >= 73 && $m['nilai_sikap'] <= 76) {
                                                $skala = "3,00";
                                                $huruf = "B";
                                            } else if ($m['nilai_sikap'] >= 69 && $m['nilai_sikap'] <= 72) {
                                                $skala = "2,75";
                                                $huruf = "B-";
                                            } else if ($m['nilai_sikap'] >= 65 && $m['nilai_sikap'] <= 68) {
                                                $skala = "2,50";
                                                $huruf = "C+";
                                            } else if ($m['nilai_sikap'] >= 61 && $m['nilai_sikap'] <= 64) {
                                                $skala = "2,00";
                                                $huruf = "C";
                                            } else if ($m['nilai_sikap'] >= 40 && $m['nilai_sikap'] <= 60) {
                                                $skala = "1,00";
                                                $huruf = "D";
                                            } else {
                                                $skala = "0,00";
                                                $huruf = "E";
                                            }

                                            ?>
                                        <td><?= $skala; ?></td>
                                        <td><?= $huruf; ?></td>
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