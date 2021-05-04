<div id="tugas" class="tab-pane fade">
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Tugas Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display col-lg-12">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nim Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Detail Nilai</th>
                                    <th>Rata-Rata</th>
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