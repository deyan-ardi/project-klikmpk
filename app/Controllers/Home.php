<?php

namespace App\Controllers;

use App\Models\DetailKelasModels;
use App\Models\KegiatanTugasModels;
use App\Models\KegiatanUASModels;
use App\Models\KelasModels;
use App\Models\MahasiswaModels;
use App\Models\UsersModels;
use App\Models\KegiatanUTSModels;
use App\Models\RequestModels;
use App\Models\SikapModels;
use App\Models\SoalModels;
use App\Models\TugasModels;
use App\Models\UASModels;
use App\Models\UTSModels;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{

	public function __construct()
	{
		$this->m_user = new UsersModels();
		$this->m_kelas = new KelasModels();
		$this->m_mahasiswa = new MahasiswaModels();
		$this->m_detail_kelas = new DetailKelasModels();
		$this->m_kegiatan_uts = new KegiatanUTSModels();
		$this->m_kegiatan_uas = new KegiatanUASModels();
		$this->m_uas = new UASModels();
		$this->m_uts = new UTSModels();
		$this->m_sikap = new SikapModels();
		$this->m_tugas = new TugasModels();
		$this->m_soal = new SoalModels();
		$this->m_kegiatan_tugas = new KegiatanTugasModels();
		$this->m_unduh = new RequestModels();
		$this->validate = \Config\Services::validation();
		$this->service_img = \Config\Services::image();
	}
	public function index()
	{
		if (logged_in() && !empty(user())) {
			$data = [
				"title" => "Dashboard",
				"validation" => $this->validate,
				"kelas" => $this->m_kelas->getAllKelas(user()->id),
				"tot_kelas" => $this->m_kelas->getTotalKelas(user()->id),
				"tot_mahasiswa" => $this->m_mahasiswa->getTotalMahasiswa(user()->id),
				"get_all_mahasiswa" => $this->m_detail_kelas->findAll(),
			];
			if ($this->request->getPost('submit_kelas')) {
				$formUbah = $this->validate([
					'nama_kelas' => 'required|max_length[50]',
					'matkul' => 'required|max_length[50]',
					'semester' => 'required|integer',
				]);
				if (!$formUbah) {
					return redirect()->to('/')->withInput();
				} else {
					$saveKelas = $this->m_kelas->save([
						"id_user" => user()->id,
						"nama_kelas" => $this->request->getPost('nama_kelas'),
						"semester" => $this->request->getPost('semester'),
						"mata_kuliah" => $this->request->getPost('matkul'),
						"created_by" => user()->username
					]);
					if ($saveKelas) {
						session()->setFlashdata('berhasil', 'Berhasil Membuat Kelas');
						return redirect()->to('/');
					} else {
						session()->setFlashdata('gagal', 'Gagal Membuat Kelas');
						return redirect()->to('/');
					}
				}
			} else {
				return view('admin/page/index', $data);
			}
		} else {
			return redirect()->to('/login');
		}
	}

	public function bank_soal()
	{
		if (logged_in() && !empty(user())) {
			$data = [
				"title" => "Bank Soal Mata Kuliah",
				"validation" => $this->validate,
				"data_soal" => $this->m_soal->findAll(),
				"data_unduh" => $this->m_unduh->findAll(),

			];
			if ($this->request->getPost('submit_file_soal')) {
				$formSubmit = $this->validate([
					'kategori' => 'required',
					'matkul' => 'required|max_length[150]',
					'deskripsi' => 'required|max_length[150]',
					'file' => 'uploaded[file]|max_size[file,2048]|mime_in[file,application/pdf]|ext_in[file,pdf]',
				]);
				if (!$formSubmit) {
					return redirect()->to('/bank-soal')->withInput();
				} else {
					if ($this->request->getFile('file')->getError() == 0) {
						$dataSoal = $this->request->getFile('file');
						$namaSoal = $dataSoal->getRandomName();
						$dataSoal->move('data_soal', $namaSoal);
						$saveSoal = $this->m_soal->save([
							'kategori_soal' => $this->request->getPost('kategori'),
							'mata_kuliah' => $this->request->getPost('matkul'),
							'deskripsi_soal' => $this->request->getPost('deskripsi'),
							'file_pdf' => $namaSoal,
							'created_by' => user()->username,
						]);
						if ($saveSoal) {
							session()->setFlashdata('berhasil', 'Berhasil Menambahkan Soal');
							return redirect()->to('/bank-soal');
						} else {
							session()->setFlashdata('gagal', 'Gagal Menambahkan Soal');
							return redirect()->to('/bank-soal');
						}
					} else if (!empty($this->request->getPost('submit_ajukan_unduh'))) {
						if ($this->m_unduh->cekApakahAda($this->request->getPost('id_soal'), $this->request->getPost('diajukan')) > 0) {
							session()->setFlashdata('gagal', 'Gagal, Anda Sudah Mengajukannya');
							return redirect()->to('/bank-soal');
						} else {
							$savePengajuan = $this->m_unduh->save([
								'id_bank_soal' => $this->request->getPost('id_soal'),
								'id_user' => $this->request->getPost('id_user'),
								'status_unduh' => 0,
								'pesan_pengajuan' => $this->request->getPost('pesan'),
							]);
							if ($savePengajuan) {
								session()->setFlashdata('berhasil', 'Berhasil Menambahkan Pengajuan Unduhan');
								return redirect()->to('/bank-soal');
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Pengajuan Unduhan');
								return redirect()->to('/bank-soal');
							}
						}
					} else {
						dd($this->request->getPost());
					}
				}
			} else {
				return view('admin/page/bank', $data);
			}
		} else {
			return redirect()->to('/login');
		}
	}
	public function informasi_website()
	{
		if (logged_in() && !empty(user())) {
			$data = [
				"title" => "Informasi Website",
				"kelas" => $this->m_kelas->getAllKelas(user()->id),
			];

			return view('admin/page/info', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function daftar_kelas($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$data = [
					"title" => "Manajemen Kelas " . $cari_kelas[0]['nama_kelas'],
					"kelas" => $this->m_kelas->getAllKelas(user()->id),
					"d_kelas" => $cari_kelas,
					"validation" => $this->validate,
					'mahasiswa' => $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas),
					"kegiatan_uts" => $this->m_kegiatan_uts->getAllKegiatanUTSWhereKelas($id_kelas),
					'nilai_uts' => $this->m_kegiatan_uts->getAllNilai(),
					"kegiatan_uas" => $this->m_kegiatan_uas->getAllKegiatanUASWhereKelas($id_kelas),
					"kegiatan_tugas" => $this->m_kegiatan_tugas->getAllKegiatanTugasWhereKelas($id_kelas),
					'nilai_uas' => $this->m_kegiatan_uas->getAllNilai(),
					'nilai_sikap' => $this->m_sikap->findAll(),
					'nilai_tugas' => $this->m_kegiatan_tugas->getAllNilai(),
					'total_per_kelas' => $this->m_mahasiswa->getTotalMahasiswaByKelas($id_kelas),
				];
				$total_nilai = 0;
				$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
				foreach ($mahasiswa as $n_mhs) {
					$total_nilai = $n_mhs['nilai_uas'] + $n_mhs['nilai_uts'] + $n_mhs['nilai_sikap'] + +$n_mhs['nilai_tugas'];
					$rerata = $total_nilai / 4;
					if ($n_mhs['nilai_uas'] >= 85 && $n_mhs['nilai_uas'] <= 100) {
						$skala = "4,00";
						$huruf = "A";
					} else if ($n_mhs['nilai_uas'] >= 81 && $n_mhs['nilai_uas'] <= 84) {
						$skala = "3,75";
						$huruf = "A-";
					} else if ($n_mhs['nilai_uas'] >= 77 && $n_mhs['nilai_uas'] <= 80) {
						$skala = "3,25";
						$huruf = "B+";
					} else if ($n_mhs['nilai_uas'] >= 73 && $n_mhs['nilai_uas'] <= 76) {
						$skala = "3,00";
						$huruf = "B";
					} else if ($n_mhs['nilai_uas'] >= 69 && $n_mhs['nilai_uas'] <= 72) {
						$skala = "2,75";
						$huruf = "B-";
					} else if ($n_mhs['nilai_uas'] >= 65 && $n_mhs['nilai_uas'] <= 68) {
						$skala = "2,50";
						$huruf = "C+";
					} else if ($n_mhs['nilai_uas'] >= 61 && $n_mhs['nilai_uas'] <= 64) {
						$skala = "2,00";
						$huruf = "C";
					} else if ($n_mhs['nilai_uas'] >= 40 && $n_mhs['nilai_uas'] <= 60) {
						$skala = "1,00";
						$huruf = "D";
					} else {
						$skala = "0,00";
						$huruf = "E";
					}
					$this->m_mahasiswa->save([
						'id_mahasiswa' => $n_mhs['id_mahasiswa'],
						'nilai_akhir' => $rerata,
						'skala' => $skala,
						'karakter' => $huruf,
					]);
					$total_nilai = 0;
				}

				if ($this->request->getPost('submit_sampul') && $this->request->getFile('sampul')->getError() == 0) {
					$formUbah = $this->validate([
						'sampul' => 'uploaded[sampul]|max_size[sampul,1048]|mime_in[sampul,image/png,image/jpg,image/jpeg]|ext_in[sampul,jpg,jpeg,png]',
					]);
					if (!$formUbah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$fotoProfil = $this->request->getFile('sampul');
						$nama_foto = $fotoProfil->getRandomName();
						$fotoProfil->move('sampul_image', $nama_foto);
						$thumbnail = $this->service_img
							->withFile('sampul_image/' . $nama_foto)
							->fit(1600, 450, 'center')
							->save('sampul_image/' . $nama_foto);
						if ($thumbnail) {
							if ($cari_kelas[0]['sampul_kelas'] != null) {
								if (unlink('sampul_image/' . $cari_kelas[0]['sampul_kelas'])) {
									$unlink = true;
								} else {
									$unlink = false;
								}
							} else {
								$unlink = true;
							}
							if ($unlink) {
								$updateUser = $this->m_kelas->save([
									'id_kelas' => $id_kelas,
									'sampul_kelas' => $nama_foto,
								]);
								if ($updateUser) {
									session()->setFlashdata('berhasil', 'Berhasil Mengubah Sampul Kelas');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Mengubah Sampul Kelas');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Mengubah Sampul Kelas');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_kelas'))) {
					$formUbah = $this->validate([
						'nama_kelas' => 'required|max_length[50]',
						'matkul' => 'required|max_length[50]',
						'semester' => 'required|integer',
					]);
					if (!$formUbah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveKelas = $this->m_kelas->save([
							"id_kelas" => $id_kelas,
							"nama_kelas" => $this->request->getPost('nama_kelas'),
							"semester" => $this->request->getPost('semester'),
							"mata_kuliah" => $this->request->getPost('matkul'),
						]);
						if ($saveKelas) {
							session()->setFlashdata('berhasil', 'Berhasil Memeperbaharui Kelas');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							session()->setFlashdata('gagal', 'Gagal Memperbaharui Kelas');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_mahasiswa'))) {
					$formTambah = $this->validate([
						'nim' => 'required|integer|max_length[10]',
						'nama_mahasiswa' => 'required|max_length[150]',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if ($this->m_mahasiswa->cekMahasiswaKelas($this->request->getPost('nim'), ucWords($this->request->getPost('nama_mahasiswa')), $id_kelas) > 0) {
							echo "Data Mahasiswa Sudah Ada";
						} else {
							$saveMahasiswaManual = $this->m_mahasiswa->save([
								'nim_mahasiswa' => $this->request->getPost('nim'),
								'nama_mahasiswa' => ucWords($this->request->getPost('nama_mahasiswa')),
								'nilai_sikap' => 0,
								'nilai_uts' => 0,
								'nilai_uas' => 0,
								'nilai_akhir' => 0,
								'skala' => "0,00",
								'karakter' => "E",

							]);
							$id_mahasiswa = $this->m_mahasiswa->insertID();
							if ($saveMahasiswaManual) {
								$addDetailKelas = $this->m_detail_kelas->save([
									'id_kelas' => $id_kelas,
									'id_mahasiswa' => $id_mahasiswa,
								]);
								if ($addDetailKelas) {
									session()->setFlashdata('berhasil', 'Berhasil Menambahkan Mahasiswa');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Mahasiswa');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Mahasiswa');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_ubah_mahasiswa'))) {
					$formTambah = $this->validate([
						'nim' => 'required|integer|max_length[10]',
						'nama_mahasiswa' => 'required|max_length[150]',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$cari_mahasiswa = $this->m_mahasiswa->find($this->request->getPost('id_mahasiswa'));
						if (!empty($cari_mahasiswa)) {
							if ($cari_mahasiswa['nama_mahasiswa'] == ucWords($this->request->getPost('nama_mahasiswa'))) {
								$nama_mahasiswa = $cari_mahasiswa['nama_mahasiswa'];
							} else {
								$nama_mahasiswa = ucWords($this->request->getPost('nama_mahasiswa'));
							}
							if ($cari_mahasiswa['nim_mahasiswa'] == $this->request->getPost('nim')) {
								$nim = $cari_mahasiswa['nim_mahasiswa'];
							} else {
								$nim = ucWords($this->request->getPost('nim'));
							}

							if ($cari_mahasiswa['nama_mahasiswa'] != ucWords($this->request->getPost('nama_mahasiswa')) || $cari_mahasiswa['nim_mahasiswa'] != $this->request->getPost('nim')) {
								if ($this->m_mahasiswa->cekMahasiswaKelas($this->request->getPost('nim'), ucWords($this->request->getPost('nama_mahasiswa')), $id_kelas) > 0) {
									echo "Data Mahasiswa Sudah Ada";
								} else {
									$saveUbahMahasiswaManual = $this->m_mahasiswa->save([
										'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
										'nim_mahasiswa' => $nim,
										'nama_mahasiswa' => $nama_mahasiswa,
									]);
									if ($saveUbahMahasiswaManual) {
										session()->setFlashdata('berhasil', 'Berhasil Mengubah Mahasiswa');
										return redirect()->to('/masuk-kelas/' . $id_kelas);
									} else {
										session()->setFlashdata('gagal', 'Gagal Mengubah Mahasiswa');
										return redirect()->to('/masuk-kelas/' . $id_kelas);
									}
								}
							} else {
								$saveUbahMahasiswaManual = $this->m_mahasiswa->save([
									'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
									'nim_mahasiswa' => $nim,
									'nama_mahasiswa' => $nama_mahasiswa,
								]);
								if ($saveUbahMahasiswaManual) {
									session()->setFlashdata('berhasil', 'Berhasil Mengubah Mahasiswa');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Mengubah Mahasiswa');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_kegiatan_uts'))) {
					$formTambah = $this->validate([
						'nama_uts' => 'required|max_length[250]',
						'tgl_uts' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveUTS = $this->m_kegiatan_uts->save([
							"id_kelas" => $id_kelas,
							"nama_uts" => $this->request->getPost('nama_uts'),
							"kategori_uts" => $this->request->getPost('kategori_uts'),
							"tgl_uts" => $this->request->getPost('tgl_uts'),
							"created_by" => user()->username,
						]);
						if ($saveUTS) {
							$total_uts = $this->m_kegiatan_uts->getTotalUTS($id_kelas);
							$nilai_mahasiswa = $this->m_uts->findAll();
							$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
							$total_nilai = 0;
							if (empty($mahasiswa)) {
								$updateNilaiUTS = true;
							} else {
								foreach ($mahasiswa as $mhs) {
									if (!empty($nilai_mahasiswa)) {
										foreach ($nilai_mahasiswa as $n_mhs) {
											if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
												$total_nilai = $total_nilai + $n_mhs['nilai_uts'];
												$rerata = $total_nilai / $total_uts;
												$updateNilaiUTS = $this->m_mahasiswa->save([
													'id_mahasiswa' => $mhs['id_mahasiswa'],
													'nilai_uts' => $rerata,
												]);
												$total_nilai = 0;
											}
										}
									} else {
										$updateNilaiUTS = true;
									}
								}
							}
							if ($updateNilaiUTS) {
								session()->setFlashdata('berhasil', 'Berhasil Menambahkan Kegiatan UTS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan UTS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						} else {
							session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan UTS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_kegiatan_tugas'))) {
					$formTambah = $this->validate([
						'nama_tugas' => 'required|max_length[250]',
						'tgl_tugas' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveTugas = $this->m_kegiatan_tugas->save([
							"id_kelas" => $id_kelas,
							"nama_tugas" => $this->request->getPost('nama_tugas'),
							"kategori_tugas" => $this->request->getPost('kategori_tugas'),
							"tgl_tugas" => $this->request->getPost('tgl_tugas'),
							"created_by" => user()->username,
						]);
						if ($saveTugas) {
							$total_tugas = $this->m_kegiatan_tugas->getTotalTugas($id_kelas);
							$nilai_mahasiswa = $this->m_tugas->findAll();
							$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
							$total_nilai = 0;
							if (empty($mahasiswa)) {
								$updateTugas = true;
							} else {
								foreach ($mahasiswa as $mhs) {
									if (!empty($nilai_mahasiswa)) {
										foreach ($nilai_mahasiswa as $n_mhs) {
											if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
												$total_nilai = $total_nilai + $n_mhs['nilai_tugas'];
												$rerata = $total_nilai / $total_tugas;
												$updateTugas = $this->m_mahasiswa->save([
													'id_mahasiswa' => $mhs['id_mahasiswa'],
													'nilai_tugas' => $rerata,
												]);
												$total_nilai = 0;
											}
										}
									} else {
										$updateTugas = true;
									}
								}
							}
							if ($updateTugas) {
								session()->setFlashdata('berhasil', 'Berhasil Menambahkan Kegiatan Tugas');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan Tugas');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						} else {
							session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan Tugas');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_ubah_kegiatan_uts'))) {
					$formTambah = $this->validate([
						'nama_uts' => 'required|max_length[250]',
						'tgl_uts' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveUTS = $this->m_kegiatan_uts->save([
							"id_kegiatan_uts" => $this->request->getPost('id_kegiatan_uts'),
							"id_kelas" => $id_kelas,
							"nama_uts" => $this->request->getPost('nama_uts'),
							"kategori_uts" => $this->request->getPost('kategori_uts'),
							"tgl_uts" => $this->request->getPost('tgl_uts'),
							"created_by" => user()->username,
						]);
						if ($saveUTS) {
							session()->setFlashdata('berhasil', 'Berhasil Mengubah Kegiatan UTS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							session()->setFlashdata('gagal', 'Gagal Mengubah Kegiatan UTS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_ubah_kegiatan_tugas'))) {
					$formTambah = $this->validate([
						'nama_tugas' => 'required|max_length[250]',
						'tgl_tugas' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveUTS = $this->m_kegiatan_tugas->save([
							"id_kegiatan_tugas" => $this->request->getPost('id_kegiatan_tugas'),
							"id_kelas" => $id_kelas,
							"nama_tugas" => $this->request->getPost('nama_tugas'),
							"kategori_tugas" => $this->request->getPost('kategori_tugas'),
							"tgl_tugas" => $this->request->getPost('tgl_tugas'),
							"created_by" => user()->username,
						]);
						if ($saveUTS) {
							session()->setFlashdata('berhasil', 'Berhasil Mengubah Data Tugas');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							session()->setFlashdata('gagal', 'Gagal Mengubah Data Tugas');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_nilai_uts'))) {
					$formTambah = $this->validate([
						'kategori_uts' => 'required',
						'mahasiswa' => 'required',
						'nilai_uts' => 'required',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if ($this->m_uts->cekWhereUserKegiatan($this->request->getPost('mahasiswa'), $this->request->getPost('kategori_uts')) > 0) {
							session()->setFlashdata('gagal', 'Nilai Untuk Mahasiswa Ini Sudah Ada');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							$saveNilaiMahasiswa = $this->m_uts->save([
								'id_mahasiswa' => $this->request->getPost('mahasiswa'),
								'id_kegiatan_uts' => $this->request->getPost('kategori_uts'),
								'nilai_uts' => $this->request->getPost('nilai_uts'),
							]);
							if ($saveNilaiMahasiswa) {
								$total_uts = $this->m_kegiatan_uts->getTotalUTS($id_kelas);
								$nilai_mahasiswa = $this->m_uts->getAllNilaiWhereMahasiswa($this->request->getPost('mahasiswa'));
								$total_nilai = 0;
								foreach ($nilai_mahasiswa as $n_mhs) {
									$total_nilai = $total_nilai + $n_mhs['nilai_uts'];
								}
								$rerata = $total_nilai / $total_uts;
								$updateNilaiUTS = $this->m_mahasiswa->save([
									'id_mahasiswa' => $this->request->getPost('mahasiswa'),
									'nilai_uts' => $rerata,
								]);
								if ($updateNilaiUTS) {
									session()->setFlashdata('berhasil', 'Berhasil Menambahkan Nilai UTS');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai UTS');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai UTS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_nilai_tugas'))) {
					$formTambah = $this->validate([
						'kategori_tugas' => 'required',
						'mahasiswa' => 'required',
						'nilai_tugas' => 'required',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if ($this->m_tugas->cekWhereUserKegiatan($this->request->getPost('mahasiswa'), $this->request->getPost('kategori_tugas')) > 0) {
							session()->setFlashdata('gagal', 'Nilai Untuk Mahasiswa Ini Sudah Ada');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							$saveNilaiMahasiswa = $this->m_tugas->save([
								'id_mahasiswa' => $this->request->getPost('mahasiswa'),
								'id_kegiatan_tugas' => $this->request->getPost('kategori_tugas'),
								'nilai_tugas' => $this->request->getPost('nilai_tugas'),
							]);
							if ($saveNilaiMahasiswa) {
								$total_tugas = $this->m_kegiatan_tugas->getTotalTugas($id_kelas);
								$nilai_mahasiswa = $this->m_tugas->getAllNilaiWhereMahasiswa($this->request->getPost('mahasiswa'));
								$total_nilai = 0;
								foreach ($nilai_mahasiswa as $n_mhs) {
									$total_nilai = $total_nilai + $n_mhs['nilai_tugas'];
								}
								$rerata = $total_nilai / $total_tugas;
								$updateNilaiTugas = $this->m_mahasiswa->save([
									'id_mahasiswa' => $this->request->getPost('mahasiswa'),
									'nilai_tugas' => $rerata,
								]);
								if ($updateNilaiTugas) {
									session()->setFlashdata('berhasil', 'Berhasil Menambahkan Nilai Tugas');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai Tugas');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai Tugas');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if ($this->request->getPost('submit_excel_mahasiswa') && $this->request->getFile('file_excel')->getError() == 0) {
					$formUbah = $this->validate([
						'file_excel' => 'uploaded[file_excel]|max_size[file_excel,5048]|mime_in[file_excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel]|ext_in[file_excel,xlsx,xls]',
					]);
					if (!$formUbah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$file = $this->request->getFile('file_excel');
						if ($file) {
							$excelReader  = new PHPExcel();
							//mengambil lokasi temp file
							$fileLocation = $file->getTempName();
							//baca file
							$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
							//ambil sheet active
							$sheet	= $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
							//looping untuk mengambil data
							foreach ($sheet as $idx => $data) {
								//skip index 1 karena title excel
								if ($idx == 1) {
									continue;
								}
								$nim = $data['A'];
								$nama = $data['B'];
								// insert data
								$up_excel = $this->m_mahasiswa->save([
									'nim_mahasiswa' => $nim,
									'nama_mahasiswa' => ucWords($nama),
									'nilai_sikap' => 0,
									'nilai_uts' => 0,
									'nilai_uas' => 0,
									'nilai_akhir' => 0,
									'skala' => "0,00",
									'karakter' => "E",
								]);
								$id_mahasiswa_up = $this->m_mahasiswa->insertID();
								if ($up_excel) {
									$up_kelas_excel = $this->m_detail_kelas->save([
										'id_kelas' => $id_kelas,
										'id_mahasiswa' => $id_mahasiswa_up,
									]);
									if ($up_kelas_excel) {
										$status = true;
									} else {
										$status = false;
										break;
									}
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Excel Mahasiswa');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							}
							if ($status == true) {
								session()->setFlashdata('berhasil', 'Berhasil Menambahkan Excel Mahasiswa');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Excel Mahasiswa');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						} else {
							session()->setFlashdata('gagal', 'Gagal Menambahkan Excel Mahasiswa');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_kegiatan_uas'))) {
					$formTambah = $this->validate([
						'nama_uas' => 'required|max_length[250]',
						'tgl_uas' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveUAS = $this->m_kegiatan_uas->save([
							"id_kelas" => $id_kelas,
							"nama_uas" => $this->request->getPost('nama_uas'),
							"kategori_uas" => $this->request->getPost('kategori_uas'),
							"tgl_uas" => $this->request->getPost('tgl_uas'),
							"created_by" => user()->username,
						]);
						if ($saveUAS) {
							$total_uas = $this->m_kegiatan_uas->getTotalUAS($id_kelas);
							$nilai_mahasiswa = $this->m_uas->findAll();
							$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
							$total_nilai = 0;
							if (empty($mahasiswa)) {
								$updateNilaiUAS = true;
							} else {
								foreach ($mahasiswa as $mhs) {
									if (!empty($nilai_mahasiswa)) {
										foreach ($nilai_mahasiswa as $n_mhs) {
											if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
												$total_nilai = $total_nilai + $n_mhs['nilai_uas'];
												$rerata = $total_nilai / $total_uas;
												$updateNilaiUAS = $this->m_mahasiswa->save([
													'id_mahasiswa' => $n_mhs['id_mahasiswa'],
													'nilai_uas' => $rerata,
												]);
												$total_nilai = 0;
											}
										}
									} else {
										$updateNilaiUAS = true;
									}
								}
							}
							if ($updateNilaiUAS) {
								session()->setFlashdata('berhasil', 'Berhasil Menambahkan Kegiatan UAS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan UAS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						} else {
							session()->setFlashdata('gagal', 'Gagal Menambahkan Kegiatan UAS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_ubah_kegiatan_uas'))) {
					$formTambah = $this->validate([
						'nama_uas' => 'required|max_length[250]',
						'tgl_uas' => 'required|valid_date',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						$saveUAS = $this->m_kegiatan_uas->save([
							"id_kegiatan_uas" => $this->request->getPost('id_kegiatan_uas'),
							"id_kelas" => $id_kelas,
							"nama_uas" => $this->request->getPost('nama_uas'),
							"kategori_uas" => $this->request->getPost('kategori_uas'),
							"tgl_uas" => $this->request->getPost('tgl_uas'),
							"created_by" => user()->username,
						]);
						if ($saveUAS) {
							session()->setFlashdata('berhasil', 'Berhasil Mengubah Kegiatan UAS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							session()->setFlashdata('gagal', 'Gagal Mengubah Kegiatan UAS');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else if (!empty($this->request->getPost('submit_nilai_uas'))) {
					$formTambah = $this->validate([
						'kategori_uas' => 'required',
						'mahasiswa' => 'required',
						'nilai_uas' => 'required',
					]);
					if (!$formTambah) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if ($this->m_uas->cekWhereUserKegiatan($this->request->getPost('mahasiswa'), $this->request->getPost('kategori_uas')) > 0) {
							session()->setFlashdata('gagal', 'Nilai Untuk Mahasiswa Ini Sudah Ada');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							$saveNilaiMahasiswa = $this->m_uas->save([
								'id_mahasiswa' => $this->request->getPost('mahasiswa'),
								'id_kegiatan_uas' => $this->request->getPost('kategori_uas'),
								'nilai_uas' => $this->request->getPost('nilai_uas'),
							]);
							if ($saveNilaiMahasiswa) {
								$total_uas = $this->m_kegiatan_uas->getTotalUAS($id_kelas);
								$nilai_mahasiswa = $this->m_uas->getAllNilaiWhereMahasiswa($this->request->getPost('mahasiswa'));
								$total_nilai = 0;
								foreach ($nilai_mahasiswa as $n_mhs) {
									$total_nilai = $total_nilai + $n_mhs['nilai_uas'];
								}
								$rerata = $total_nilai / $total_uas;
								$updateNilaiUAS = $this->m_mahasiswa->save([
									'id_mahasiswa' => $this->request->getPost('mahasiswa'),
									'nilai_uas' => $rerata,
								]);
								if ($updateNilaiUAS) {
									session()->setFlashdata('berhasil', 'Berhasil Menambahkan Nilai UAS');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai UAS');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai UAS');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_nilai_sikap_partisipasi'))) {
					$formSubmiNilaiSikap = $this->validate([
						'mahasiswa' => 'required',
						'santun' => 'required',
						'disiplin' => 'required',
						'berani' => 'required',
						'kehadiran' => 'required',
						'kepatuhan' => 'required',
						'keaktifan' => 'required',
					]);
					if (!$formSubmiNilaiSikap) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if ($this->m_sikap->cekNilaiWhereMahasiswa($this->request->getPost('mahasiswa'), $id_kelas) > 0) {
							session()->setFlashdata('gagal', 'Nilai Untuk Mahasiswa Ini Sudah Ada');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							$santun = $this->request->getPost('santun');
							$disiplin = $this->request->getPost('disiplin');
							$berani = $this->request->getPost('berani');
							$kehadiran = $this->request->getPost('kehadiran');
							$kepatuhan = $this->request->getPost('kepatuhan');
							$keaktifan = $this->request->getPost('keaktifan');
							$nilai_sikap = (($santun * 2) + ($disiplin * 2) + $berani) / 5;
							$nilai_partisipasi = (($kepatuhan * 2) + ($keaktifan * 2) + $kehadiran) / 5;
							$rerata_sikap = ($nilai_sikap + $nilai_partisipasi) / 2;
							$saveNilaiSikapPartisipasi = $this->m_sikap->save([
								'id_mahasiswa' => $this->request->getPost('mahasiswa'),
								'nilai_santun' => $santun,
								'nilai_disiplin' => $disiplin,
								'nilai_berani' => $berani,
								'hasil_nilai_sikap' => $nilai_sikap,
								'nilai_kehadiran' => $kehadiran,
								'nilai_kepatuhan' => $kepatuhan,
								'nilai_keaktifan' => $keaktifan,
								'hasil_nilai_partisipasi' => $nilai_partisipasi
							]);
							if ($saveNilaiSikapPartisipasi) {
								$updateMahasiswa = $this->m_mahasiswa->save([
									'id_mahasiswa' => $this->request->getPost('mahasiswa'),
									'nilai_sikap' => $rerata_sikap,
								]);
								if ($updateMahasiswa) {
									session()->setFlashdata('berhasil', 'Berhasil Menambahkan Nilai Sikap dan Partisipasi');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								} else {
									session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai Sikap dan Partisipasi');
									return redirect()->to('/masuk-kelas/' . $id_kelas);
								}
							} else {
								session()->setFlashdata('gagal', 'Gagal Menambahkan Nilai Sikap dan Partisipasi');
								return redirect()->to('/masuk-kelas/' . $id_kelas);
							}
						}
					}
				} else if (!empty($this->request->getPost('submit_bagikan_nilai'))) {
					$formSubmiBagikan = $this->validate([
						'n_seluruh' => 'required',
						'n_tugas' => 'required',
						'n_uts' => 'required',
						'n_uas' => 'required',
						'n_sikap' => 'required',
					]);
					if (!$formSubmiBagikan) {
						return redirect()->to('/masuk-kelas/' . $id_kelas)->withInput();
					} else {
						if (empty($cari_kelas[0]['tautan'])) {
							$string = "BCDFGHIJKLMNPQRSTVWXYZbcdfghjklmnpqrstvwxyz";
							$url = substr(str_shuffle($string), 0, 6);
						} else {
							$url = $cari_kelas[0]['tautan'];
						}
						$saveBagikanLink = $this->m_kelas->save([
							'id_kelas' => $id_kelas,
							'bagikan' => 1,
							'tautan' => $url,
							'n_seluruh' => $this->request->getPost('n_seluruh'),
							'n_tugas' => $this->request->getPost('n_tugas'),
							'n_uts' => $this->request->getPost('n_uts'),
							'n_uas' => $this->request->getPost('n_uas'),
							'n_sikap' => $this->request->getPost('n_sikap'),
						]);
						if ($saveBagikanLink) {
							session()->setFlashdata('berhasil', 'Tautan Bagikan (' . site_url() . 'b/' . $url . ')');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						} else {
							session()->setFlashdata('gagal', 'Gagal Membuat Pengaturan');
							return redirect()->to('/masuk-kelas/' . $id_kelas);
						}
					}
				} else {
					return view('admin/page/kelas', $data);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function hapus_kegiatan_uts($id_kegiatan_uts = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kegiatan_uts) && !empty($id_kelas)) {
			$cari_kegiatan_uts = $this->m_kegiatan_uts->find($id_kegiatan_uts);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kegiatan_uts) && !empty($cari_kelas)) {
				$total_uts = $this->m_kegiatan_uts->getTotalUTS($id_kelas);
				$tot_if_hapus = $total_uts - 1;
				$nilai_mahasiswa = $this->m_uts->findAll();
				$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
				$total_nilai = 0;
				if (!empty($mahasiswa)) {
					foreach ($mahasiswa as $mhs) {
						if (!empty($nilai_mahasiswa)) {
							foreach ($nilai_mahasiswa as $n_mhs) {
								if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
									$total_nilai = $total_nilai + $n_mhs['nilai_uts'];
									$rerata = $total_nilai / $total_uts;
									if ($tot_if_hapus > 0) {
										$updateNilaiUTS = $this->m_mahasiswa->save([
											'id_mahasiswa' => $mhs['id_mahasiswa'],
											'nilai_uts' => $rerata,
										]);
									} else {
										$updateNilaiUTS = $this->m_mahasiswa->save([
											'id_mahasiswa' => $mhs['id_mahasiswa'],
											'nilai_uts' => 0,
										]);
									}
									$total_nilai = 0;
								}
							}
						} else {
							$updateNilaiUTS = true;
						}
					}
				} else {
					$updateNilaiUTS = true;
				}
				if ($updateNilaiUTS) {
					if ($this->m_kegiatan_uts->delete($id_kegiatan_uts)) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Kegiatan UTS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Kegiatan UTS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Kegiatan UTS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_kegiatan_tugas($id_kegiatan_tugas = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kegiatan_tugas) && !empty($id_kelas)) {
			$cari_kegiatan_tugas = $this->m_kegiatan_tugas->find($id_kegiatan_tugas);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kegiatan_tugas) && !empty($cari_kelas)) {
				$total_tugas = $this->m_kegiatan_tugas->getTotalTugas($id_kelas);
				$tot_if_hapus = $total_tugas - 1;
				$nilai_mahasiswa = $this->m_tugas->findAll();
				$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
				$total_nilai = 0;
				if (!empty($mahasiswa)) {
					foreach ($mahasiswa as $mhs) {
						if (!empty($nilai_mahasiswa)) {
							foreach ($nilai_mahasiswa as $n_mhs) {
								if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
									$total_nilai = $total_nilai + $n_mhs['nilai_tugas'];
									$rerata = $total_nilai / $total_tugas;
									if ($tot_if_hapus > 0) {
										$updateNilaiTugas = $this->m_mahasiswa->save([
											'id_mahasiswa' => $mhs['id_mahasiswa'],
											'nilai_tugas' => $rerata,
										]);
									} else {
										$updateNilaiTugas = $this->m_mahasiswa->save([
											'id_mahasiswa' => $mhs['id_mahasiswa'],
											'nilai_tugas' => 0,
										]);
									}
									$total_nilai = 0;
								}
							}
						} else {
							$updateNilaiTugas = true;
						}
					}
				} else {
					$updateNilaiTugas = true;
				}
				if ($updateNilaiTugas) {
					if ($this->m_kegiatan_tugas->delete($id_kegiatan_tugas)) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Data Tugas Yang Diberikan');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Data Tugas Yang Diberikan');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Data Tugas Yang Diberikan');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_kegiatan_uas($id_kegiatan_uas = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kegiatan_uas) && !empty($id_kelas)) {
			$cari_kegiatan_uas = $this->m_kegiatan_uas->find($id_kegiatan_uas);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kegiatan_uas) && !empty($cari_kelas)) {

				$total_uas = $this->m_kegiatan_uas->getTotalUAS($id_kelas);
				$tot_if_hapus = $total_uas - 1;
				$nilai_mahasiswa = $this->m_uas->findAll();
				$mahasiswa = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
				$total_nilai = 0;
				if (empty($mahasiswa)) {
					$updateNilaiUAS = true;
				} else {
					foreach ($mahasiswa as $mhs) {
						if (!empty($nilai_mahasiswa)) {
							foreach ($nilai_mahasiswa as $n_mhs) {
								if ($n_mhs['id_mahasiswa'] == $mhs['id_mahasiswa']) {
									$total_nilai = $total_nilai + $n_mhs['nilai_uas'];
									$rerata = $total_nilai / $total_uas;
									if ($tot_if_hapus) {
										$updateNilaiUAS = $this->m_mahasiswa->save([
											'id_mahasiswa' => $n_mhs['id_mahasiswa'],
											'nilai_uas' => $rerata,
										]);
									} else {
										$updateNilaiUAS = $this->m_mahasiswa->save([
											'id_mahasiswa' => $n_mhs['id_mahasiswa'],
											'nilai_uas' => 0,
										]);
									}

									$total_nilai = 0;
								}
							}
						} else {
							$updateNilaiUAS = true;
						}
					}
				}
				if ($updateNilaiUAS) {
					if ($this->m_kegiatan_uas->delete($id_kegiatan_uas)) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Kegiatan UAS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Kegiatan UAS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Kegiatan UAS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_nilai_uts($id_mahasiswa = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_mahasiswa)) {
			$cari_mahasiswa = $this->m_mahasiswa->find($id_mahasiswa);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_mahasiswa) && !empty($cari_kelas)) {
				if ($this->m_uts->hapusNilaiWhereUser($id_mahasiswa)) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						'id_mahasiswa' => $id_mahasiswa,
						'nilai_uts' => 0,
					]);
					if ($updateNilaiRata) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Nilai UTS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Nilai UTS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Nilai UTS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_nilai_uas($id_mahasiswa = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_mahasiswa) && !empty($id_kelas)) {
			$cari_mahasiswa = $this->m_mahasiswa->find($id_mahasiswa);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_mahasiswa) && !empty($cari_kelas)) {
				if ($this->m_uas->hapusNilaiWhereUser($id_mahasiswa)) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						'id_mahasiswa' => $id_mahasiswa,
						'nilai_uas' => 0,
					]);
					if ($updateNilaiRata) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Nilai UAS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Nilai UAS');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Nilai UAS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_nilai_tugas($id_mahasiswa = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_mahasiswa) && !empty($id_kelas)) {
			$cari_mahasiswa = $this->m_mahasiswa->find($id_mahasiswa);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_mahasiswa) && !empty($cari_kelas)) {
				if ($this->m_tugas->hapusNilaiWhereUser($id_mahasiswa)) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						'id_mahasiswa' => $id_mahasiswa,
						'nilai_tugas' => 0,
					]);
					if ($updateNilaiRata) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Nilai Tugas');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Nilai Tugas');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Nilai Tugas');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_nilai_sikap_partisipasi($id_mahasiswa = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_mahasiswa) && !empty($id_kelas)) {
			$cari_mahasiswa = $this->m_mahasiswa->find($id_mahasiswa);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_mahasiswa) && !empty($cari_kelas)) {
				if ($this->m_sikap->hapusNilaiWhereUser($id_mahasiswa)) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						'id_mahasiswa' => $id_mahasiswa,
						'nilai_sikap' => 0,
					]);
					if ($updateNilaiRata) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Nilai Sikap Partisipasi');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Nilai Sikap Partisipasi');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Nilai Sikap Partisipasi');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function export_excel($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$users = $this->m_mahasiswa->getAllMahasiswaWhereKelas($id_kelas);
				$fileName = 'Data Nilai Mahasiswa.xlsx';
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();
				$sheet->mergeCells('A1:J1');
				$sheet->mergeCells('A2:J2');
				$sheet->mergeCells('A3:J3');
				$sheet->setCellValue('A1', 'DATA NILAI MAHASISWA KELAS ' . $cari_kelas[0]['nama_kelas']);
				$sheet->setCellValue('A2', 'MATA KULIAH ' . strtoupper($cari_kelas[0]['mata_kuliah']));
				$sheet->setCellValue('A3', 'SEMESTER ' . $cari_kelas[0]['semester']);
				$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
				$sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
				$sheet->getStyle('A3')->getAlignment()->setHorizontal('center');
				$sheet->setCellValue('A6', '#');
				$sheet->setCellValue('B6', 'NIM Mahasiswa');
				$sheet->getStyle('B6')->getAlignment()->setHorizontal('center');
				$sheet->setCellValue('C6', 'Nama Mahasiswa');
				$sheet->getStyle('C6')->getAlignment()->setHorizontal('center');
				$sheet->setCellValue('D6', 'Nilai Sikap');
				$sheet->setCellValue('E6', 'Nilai Tugas');
				$sheet->setCellValue('F6', 'Nilai UTS');
				$sheet->setCellValue('G6', 'Nilai UAS');
				$sheet->setCellValue('H6', 'Nilai Rata-Rata');
				$sheet->setCellValue('I6', 'Nilai Skala');
				$sheet->setCellValue('J6', 'Nilai Huruf');
				$sheet->getStyle('A6:J6')->getAlignment()->setHorizontal('center');
				$rows = 7;
				$i = 1;
				foreach ($users as $val) {
					$sheet->setCellValue('A' . $rows, $i++);
					$sheet->getColumnDimension('A')->setAutoSize(true);
					$sheet->getStyle('A')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('B' . $rows, $val['nim_mahasiswa']);
					$sheet->getColumnDimension('B')->setAutoSize(true);
					$sheet->getStyle('B' . $rows)->getAlignment()->setHorizontal('left');

					$sheet->setCellValue('C' . $rows, $val['nama_mahasiswa']);
					$sheet->getColumnDimension('C')->setAutoSize(true);
					$sheet->getStyle('C' . $rows)->getAlignment()->setHorizontal('left');

					$sheet->setCellValue('D' . $rows, $val['nilai_sikap']);
					$sheet->getColumnDimension('D')->setAutoSize(true);
					$sheet->getStyle('D')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('E' . $rows, $val['nilai_tugas']);
					$sheet->getColumnDimension('E')->setAutoSize(true);
					$sheet->getStyle('E')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('F' . $rows, $val['nilai_uts']);
					$sheet->getColumnDimension('F')->setAutoSize(true);
					$sheet->getStyle('F')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('G' . $rows, $val['nilai_uas']);
					$sheet->getColumnDimension('G')->setAutoSize(true);
					$sheet->getStyle('G')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('H' . $rows, $val['nilai_akhir']);
					$sheet->getColumnDimension('H')->setAutoSize(true);
					$sheet->getStyle('H')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('I' . $rows, $val['skala']);
					$sheet->getColumnDimension('I')->setAutoSize(true);
					$sheet->getStyle('I')->getAlignment()->setHorizontal('center');

					$sheet->setCellValue('J' . $rows, $val['karakter']);
					$sheet->getColumnDimension('J')->setAutoSize(true);
					$sheet->getStyle('J')->getAlignment()->setHorizontal('center');

					$rows++;
				}
				$styleArray = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						],
					],
				];
				$d = $rows - 1;
				$sheet->getStyle('A6:J' . $d)->applyFromArray($styleArray);
				$e = $rows + 5;
				$f = $rows + 6;
				$g = $rows + 11;
				$sheet->mergeCells('A' . $e . ':J' . $e);
				$sheet->mergeCells('A' . $f . ':J' . $f);
				$sheet->mergeCells('A' . $g . ':J' . $g);
				$sheet->setCellValue('A' . $e, 'Sistem Informasi KLIKMPK');
				$sheet->setCellValue('A' . $f, 'Singaraja, ' . date('d F Y H:i') . ' WITA');
				$sheet->setCellValue('A' . $g, ucWords(user()->username));
				$sheet->getStyle('A' . $e)->getAlignment()->setHorizontal('left');
				$sheet->getStyle('A' . $f)->getAlignment()->setHorizontal('left');
				$sheet->getStyle('A' . $g)->getAlignment()->setHorizontal('left');
				$writer = new Xlsx($spreadsheet);
				$writer->save("upload/" . $fileName);
				header("Content-Type: application/vnd.ms-excel");
				return redirect()->to("/upload/" . $fileName);
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_seluruh_nilai_uts($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$hapusData = $this->m_uts->hapusAllNilaiUTS($id_kelas);
				foreach ($hapusData as $hapus) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						"id_mahasiswa" => $hapus['id_mahasiswa'],
						"nilai_uts" => 0,
					]);
					if ($updateNilaiRata) {
						if ($this->m_uts->delete($hapus['id_uts'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					} else {
						$status = false;
						break;
					}
				}
				if ($status == true) {
					session()->setFlashdata('berhasil', 'Berhasil Menghapus Seluruh Nilai UTS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Seluruh Nilai UTS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_seluruh_nilai_uas($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$hapusData = $this->m_uas->hapusAllNilaiUAS($id_kelas);
				foreach ($hapusData as $hapus) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						"id_mahasiswa" => $hapus['id_mahasiswa'],
						"nilai_uas" => 0,
					]);
					if ($updateNilaiRata) {
						if ($this->m_uas->delete($hapus['id_uas'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					} else {
						$status = false;
						break;
					}
				}
				if ($status == true) {
					session()->setFlashdata('berhasil', 'Berhasil Menghapus Seluruh Nilai UAS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Seluruh Nilai UAS');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_seluruh_nilai_sikap_partisipasi($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$hapusData = $this->m_sikap->hapusAllNilaiSikapPartisipasi($id_kelas);
				foreach ($hapusData as $hapus) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						"id_mahasiswa" => $hapus['id_mahasiswa'],
						"nilai_sikap" => 0,
					]);
					if ($updateNilaiRata) {
						if ($this->m_sikap->delete($hapus['id_sikap_partisipasi'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					} else {
						$status = false;
						break;
					}
				}
				if ($status == true) {
					session()->setFlashdata('berhasil', 'Berhasil Menghapus Seluruh Nilai Sikap Partisipasi');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Seluruh Nilai Sikap Partisipasi');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_seluruh_nilai_tugas($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$hapusData = $this->m_tugas->hapusAllNilaiTugas($id_kelas);
				foreach ($hapusData as $hapus) {
					$updateNilaiRata = $this->m_mahasiswa->save([
						"id_mahasiswa" => $hapus['id_mahasiswa'],
						"nilai_tugas" => 0,
					]);
					if ($updateNilaiRata) {
						if ($this->m_tugas->delete($hapus['id_tugas'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					} else {
						$status = false;
						break;
					}
				}
				if ($status == true) {
					session()->setFlashdata('berhasil', 'Berhasil Menghapus Seluruh Nilai Tugas');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Seluruh Nilai Tugas');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_soal($id_soal = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_soal)) {
			$cari = $this->m_soal->find($id_soal);
			if (!empty($cari)) {
				if (unlink('data_soal/' . $cari['file_pdf'])) {
					$unlink = true;
				} else {
					$unlink = false;
				}
				if ($unlink) {
					if ($this->m_soal->delete($id_soal)) {
						session()->setFlashdata('berhasil', 'Berhasil Menghapus Soal');
						return redirect()->to('/bank-soal/');
					} else {
						session()->setFlashdata('gagal', 'Gagal Menghapus Soal');
						return redirect()->to('/bank-soal/');
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Soal');
					return redirect()->to('/bank-soal/');
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_seluruh_soal()
	{
		if (logged_in() && !empty(user())) {
			$cari = $this->m_soal->findAll();
			if (!empty($cari)) {
				foreach ($cari as $c) {
					if (unlink('data_soal/' . $c['file_pdf'])) {
						if ($this->m_soal->delete($c['id_bank_soal'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					} else {
						$status = false;
						break;
					}
				}
				if ($status) {
					session()->setFlashdata('berhasil', 'Berhasil Menghapus Seluruh Soal');
					return redirect()->to('/bank-soal/');
				} else {
					session()->setFlashdata('gagal', 'Gagal Menghapus Seluruh Soal');
					return redirect()->to('/bank-soal/');
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_all($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				$cari_mahasiswa = $this->m_mahasiswa->deleteWhereMahasiswa($id_kelas);
				if (!empty($cari_mahasiswa)) {
					foreach ($cari_mahasiswa as $mhs) {
						if ($this->m_mahasiswa->delete($mhs['id_mahasiswa'])) {
							$status = true;
						} else {
							$status = false;
							break;
						}
					}
				} else {
					$status = true;
				}
				if ($status) {
					if ($this->m_detail_kelas->deleteAllMahasiswaWhereKelas($id_kelas)) {
						session()->setFlashdata('berhasil', 'Berhasil Dihapus');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Dihapus');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Dihapus');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_mahasiswa($id_mahasiswa = null, $id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_mahasiswa) && !empty($id_kelas)) {
			$cari_mahasiswa = $this->m_mahasiswa->find($id_mahasiswa);
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_mahasiswa) && !empty($cari_kelas)) {
				if ($this->m_mahasiswa->delete($id_mahasiswa)) {
					session()->setFlashdata('berhasil', 'Berhasil Dihapus');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				} else {
					session()->setFlashdata('gagal', 'Gagal Dihapus');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function hapus_kelas($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				if ($cari_kelas[0]['sampul_kelas'] != null) {
					if (unlink('sampul_image/' . $cari_kelas[0]['sampul_kelas'])) {
						$unlink = true;
					} else {
						$unlink = false;
					}
				} else {
					$unlink = true;
				}
				if ($unlink) {
					$cari_mahasiswa = $this->m_mahasiswa->deleteWhereMahasiswa($id_kelas);
					if (!empty($cari_mahasiswa)) {
						foreach ($cari_mahasiswa as $mhs) {
							if ($this->m_mahasiswa->delete($mhs['id_mahasiswa'])) {
								$status = true;
							} else {
								$status = false;
								break;
							}
						}
					} else {
						$status = true;
					}
					if ($status) {
						if ($this->m_kelas->delete($id_kelas)) {
							session()->setFlashdata('berhasil', 'Berhasil Dihapus');
							return redirect()->to('/');
						} else {
							session()->setFlashdata('gagal', 'Gagal Dihapus');
							return redirect()->to('/');
						}
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Dihapus');
					return redirect()->to('/');
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function berhenti_membagikan($id_kelas = null)
	{
		if (logged_in() && !empty(user()) && !empty($id_kelas)) {
			$cari_kelas = $this->m_kelas->getKelasByIDAndUser($id_kelas, user()->id);
			if (!empty($cari_kelas)) {
				if ($cari_kelas[0]['bagikan'] == 1) {
					$saveBagikanLink = $this->m_kelas->save([
						'id_kelas' => $id_kelas,
						'bagikan' => 0,
						'tautan' => null,
						'n_seluruh' => 0,
						'n_tugas' => 0,
						'n_uts' => 0,
						'n_uas' => 0,
						'n_sikap' => 0,
					]);
					if ($saveBagikanLink) {
						session()->setFlashdata('berhasil', 'Bagikan Data Nilai Telah Berhenti');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					} else {
						session()->setFlashdata('gagal', 'Gagal Disetel');
						return redirect()->to('/masuk-kelas/' . $id_kelas);
					}
				} else {
					session()->setFlashdata('gagal', 'Gagal Disetel');
					return redirect()->to('/masuk-kelas/' . $id_kelas);
				}
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function pengaturan_profil()
	{
		if (logged_in() && !empty(user())) {
			$data = [
				"title" => "Pengaturan Profil",
				"validation" => $this->validate,
				"kelas" => $this->m_kelas->getAllKelas(user()->id),
			];
			if (user()->email == $this->request->getPost('email')) {
				$valid = 'required|valid_email|valid_emails';
			} else {
				$valid = 'required|valid_email|valid_emails|is_unique[users.email]';
			}

			if (ucWords(user()->username) == ucWords($this->request->getPost('name'))) {
				$username = 'required';
			} else {
				$username = 'required|is_unique[users.username]';
			}

			if ($this->request->getPost('submit')) {
				$formUbah = $this->validate([
					'name' => $username,
					'email' => $valid,
					'description' => 'required|max_length[250]',
					'password' => 'permit_empty|strong_password',
					're-password' => 'permit_empty|matches[password]',
				]);
				if (!$formUbah) {
					return redirect()->to('/pengaturan-profil/')->withInput();
				} else {
					if (!empty($this->request->getPost('password') && !empty($this->request->getPost('re-password')))) {
						$hashOptions = [
							'cost' => 10,
						];
						// Enkripsi password
						$password = password_hash(
							base64_encode(
								hash('sha384', $this->request->getPost('password'), true)
							),
							PASSWORD_DEFAULT,
							$hashOptions
						);
						$status = true;
					} else {
						$password = user()->password_hash;
						$status = true;
					}

					if ($status) {
						$updateUser = $this->m_user->save([
							'id' => user()->id,
							'email' => $this->request->getPost('email'),
							'username' => $this->request->getPost('name'),
							'deskripsi' => $this->request->getPost('description'),
							'password_hash' => $password,
						]);
						if ($updateUser) {
							if (!empty($this->request->getPost('logout'))) {
								return redirect()->to('/logout');
							} else {
								session()->setFlashdata('berhasil', 'Profil Berhasil Diubah');
								return redirect()->to('/pengaturan-profil');
							}
						} else {
							session()->setFlashdata('gagal', 'Profil Gagal Diubah');
							return redirect()->to('/pengaturan-profil');
						}
					}
				}
			} else if ($this->request->getPost('submit_profil') && $this->request->getFile('profil')->getError() == 0) {
				$formUbah = $this->validate([
					'profil' => 'uploaded[profil]|max_size[profil,1048]|mime_in[profil,image/png,image/jpg,image/jpeg]|ext_in[profil,jpg,jpeg,png]',
				]);
				if (!$formUbah) {
					return redirect()->to('/pengaturan-profil/')->withInput();
				} else {
					$fotoProfil = $this->request->getFile('profil');
					$nama_foto = $fotoProfil->getRandomName();
					$fotoProfil->move('profil_image', $nama_foto);
					$thumbnail = $this->service_img
						->withFile('profil_image/' . $nama_foto)
						->fit(150, 150, 'center')
						->save('profil_image/' . $nama_foto);
					if ($thumbnail) {
						if (user()->foto_profil != null) {
							if (unlink('profil_image/' . user()->foto_profil)) {
								$unlink = true;
							} else {
								$unlink = false;
							}
						} else {
							$unlink = true;
						}
						if ($unlink) {
							$updateUser = $this->m_user->save([
								'id' => user()->id,
								'foto_profil' => $nama_foto,
							]);
							if ($updateUser) {
								session()->setFlashdata('berhasil', 'Profil Berhasil Diubah');
								return redirect()->to('/pengaturan-profil');
							} else {
								session()->setFlashdata('gagal', 'Profil Gagal Diubah');
								return redirect()->to('/pengaturan-profil');
							}
						} else {
							session()->setFlashdata('gagal', 'Profil Gagal Diubah');
							return redirect()->to('/pengaturan-profil');
						}
					}
				}
			} else if ($this->request->getPost('submit_sampul') && $this->request->getFile('sampul')->getError() == 0) {
				$formUbah = $this->validate([
					'sampul' => 'uploaded[sampul]|max_size[sampul,1048]|mime_in[sampul,image/png,image/jpg,image/jpeg]|ext_in[sampul,jpg,jpeg,png]',
				]);
				if (!$formUbah) {
					return redirect()->to('/pengaturan-profil/')->withInput();
				} else {
					$fotoProfil = $this->request->getFile('sampul');
					$nama_foto = $fotoProfil->getRandomName();
					$fotoProfil->move('sampul_image', $nama_foto);
					$thumbnail = $this->service_img
						->withFile('sampul_image/' . $nama_foto)
						->fit(1600, 450, 'center')
						->save('sampul_image/' . $nama_foto);
					if ($thumbnail) {
						if (user()->foto_sampul != null) {
							if (unlink('sampul_image/' . user()->foto_sampul)) {
								$unlink = true;
							} else {
								$unlink = false;
							}
						} else {
							$unlink = true;
						}
						if ($unlink) {
							$updateUser = $this->m_user->save([
								'id' => user()->id,
								'foto_sampul' => $nama_foto,
							]);
							if ($updateUser) {
								session()->setFlashdata('berhasil', 'Profil Berhasil Diubah');
								return redirect()->to('/pengaturan-profil');
							} else {
								session()->setFlashdata('gagal', 'Profil Gagal Diubah');
								return redirect()->to('/pengaturan-profil');
							}
						} else {
							session()->setFlashdata('gagal', 'Profil Gagal Diubah');
							return redirect()->to('/pengaturan-profil');
						}
					}
				}
			} else {
				return view('admin/page/pengaturan-profil', $data);
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
}