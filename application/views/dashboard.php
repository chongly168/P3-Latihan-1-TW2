<?php if( $this->ion_auth->is_admin() ) : ?>
<div class="row">
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->title;?></p>
        </div>
        <div class="icon">
            <i class="fa fa-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
            Lihat <i class="fa fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-lg-6 col-xs-12">
        <canvas id="canvas1"></canvas>
    </div>
    <div class="col-lg-6 col-xs-12">
        <canvas id="canvas2"></canvas>
    </div>
</div>
            <!-- Diagram -->
            <script type="text/javascript">
				var ctx = document.getElementById("canvas1").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'pie',
					data: {
					labels: [<?php foreach($info_box as $info) : ?>"<?=$info->title;?>", <?php endforeach; ?>],
					datasets: [{
						label: 'Seamolec Online Test',
						data:[<?php foreach($info_box as $info) : ?><?=$info->total;?>,<?php endforeach; ?>],
						backgroundColor: [
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
                        'rgba(103, 12, 15, 0.2)',
                        'rgba(93, 133, 155, 0.2)'
						]
					}]
					},
				});
            </script>
            <script type="text/javascript">
				var ctx = document.getElementById("canvas2").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
					labels: [<?php foreach($info_box as $info) : ?>"<?=$info->title;?>", <?php endforeach; ?>],
					datasets: [{
						label: 'Jumlah',
						data:[<?php foreach($info_box as $info) : ?><?=$info->total;?>,<?php endforeach; ?>]
					}]
					},
				});
            </script>
            <!-- End-Diagram -->
<?php elseif( $this->ion_auth->in_group('pembimbing') ) : ?>

<div class="row">
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>Nama</th>
                    <td><?=$dosen->nama_dosen?></td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td><?=$dosen->nip?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$dosen->email?></td>
                </tr>
                <tr>
                    <th>Mata Pelajaran</th>
                    <td><?=$dosen->nama_matkul?></td>
                </tr>
                <tr>
                    <th>Daftar Kelas</th>
                    <td>
                        <ol class="pl-4">
                        <?php foreach ($kelas as $k) : ?>
                            <li><?=$k->nama_kelas?></li>
                        <?php endforeach;?>
                        </ol>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="box box-solid">
            <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                <p>Seamolec Online Test merupakan tes dengan menggunakan komputer sebagai media dalam melaksanakan tes secara Online. Ujian online berbasis web ini dibangun hanya kusus untuk melaksanakan ujian mengetahui kemampuan calon peserta magang di Seameo Seamolec. Penyajian soal dilakukan secara terkomputerisasi sehingga setiap calon peserta magang tes mendapatkan urutan soal yang berbeda-beda. Untuk hak aksesnya terdiri tiga level akses, yaitu: Administrator, Pembimbing dan Peserta setiap level akses memiliki hak yang berbeda-beda. Setiap peserta yang selasai mengerjakan soal ujian dapat langsung melihat hasil ujian serta soal ujian dapat diurutkan ataupun juga diacak.</p>
                <center>
                <a href="https://seamolec.org/" target="_blank" rel="noopener noreferrer">
                    <img src="<?= base_url('assets/dist/img/seameo.png') ?>" width="7%" alt="" srcset="">
                    <img src="<?= base_url('assets/dist/img/seamolec.png') ?>" width="7%" alt="" srcset="">
                </a>
                </center>
            </div>
        </div>
    </div>
</div>

<?php else : ?>

<div class="row">
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>NIM</th>
                    <td><?=$mahasiswa->nim?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?=$mahasiswa->nama?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$mahasiswa->jenis_kelamin === 'L' ? "Laki-laki" : "Perempuan" ;?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$mahasiswa->email?></td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><?=$mahasiswa->nama_jurusan?></td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td><?=$mahasiswa->nama_kelas?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="box box-solid">
            <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                <p>Seamolec Online Test merupakan tes dengan menggunakan komputer sebagai media dalam melaksanakan tes secara Online. Ujian online berbasis web ini dibangun hanya kusus untuk melaksanakan ujian mengetahui kemampuan calon peserta magang di Seameo Seamolec. Penyajian soal dilakukan secara terkomputerisasi sehingga setiap calon peserta magang tes mendapatkan urutan soal yang berbeda-beda. Untuk hak aksesnya terdiri tiga level akses, yaitu: Administrator, Pembimbing dan Calon Peserta setiap level akses memiliki hak yang berbeda-beda. Setiap peserta yang selasai mengerjakan soal ujian dapat langsung melihat hasil ujian serta soal ujian dapat diurutkan ataupun juga diacak.</p>
                <center>
                <a href="https://seamolec.org/" target="_blank" rel="noopener noreferrer">
                    <img src="<?= base_url('assets/dist/img/Seameo.png') ?>" width="7%" alt="" srcset="">
                    <img src="<?= base_url('assets/dist/img/Seamolec.png') ?>" width="7%" alt="" srcset="">
                </a>
                </center>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>