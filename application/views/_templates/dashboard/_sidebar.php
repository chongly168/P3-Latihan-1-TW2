<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel" style="min-height: 150px;">
			<div class="image" style="text-align: center;">
				<img src="<?=base_url()?>assets/dist/img/seameo.png" class="img" alt="User Image">
				<img src="<?=base_url()?>assets/dist/img/seamolec-user.png" class="img" alt="User Image">
			</div><br />
			<div class="image" style="text-align: center; color: #fff">
				<b><?=$user->username?></b><br />
				<small><?=$user->email?></small>
			</div>
		</div>
		
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN MENU</li>
			<!-- Optionally, you can add icons to the links -->
			<?php 
			$page = $this->uri->segment(1);
			$master = ["jurusan", "kelas", "matkul", "Pembimbing", "peserta"];
			$relasi = ["kelasdosen", "jurusanmatkul"];
			$users = ["users"];
			?>
			<li class="<?= $page === 'dashboard' ? "active" : "" ?>"><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<?php if($this->ion_auth->is_admin()) : ?>
			<li class="treeview <?= in_array($page, $master)  ? "active menu-open" : ""  ?>">
				<a href="#"><i class="fa fa-folder"></i> <span>Manajemen Data</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?=$page==='jurusan'?"active":""?>">
						<a href="<?=base_url('jurusan')?>">
							<i class="fa fa-circle-o"></i> 
							Manajemen Jurusan
						</a>
					</li>
					<li class="<?=$page==='kelas'?"active":""?>">
						<a href="<?=base_url('kelas')?>">
							<i class="fa fa-circle-o"></i>
							Manajemen Kelas
						</a>
					</li>
					<li class="<?=$page==='matkul'?"active":""?>">
						<a href="<?=base_url('matkul')?>">
							<i class="fa fa-circle-o"></i>
							Manajemen Mata Pelajaran
						</a>
					</li>
					<li class="<?=$page==='Pembimbing'?"active":""?>">
						<a href="<?=base_url('Pembimbing')?>">
							<i class="fa fa-circle-o"></i>
							Manajemen Pembimbing
						</a>
					</li>
					<li class="<?=$page==='peserta'?"active":""?>">
						<a href="<?=base_url('peserta')?>">
							<i class="fa fa-circle-o"></i>
							Manajemen Peserta
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?= in_array($page, $relasi)  ? "active menu-open" : ""  ?>">
				<a href="#"><i class="fa fa-link"></i> <span>Relasi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?=$page==='kelasdosen'?"active":""?>">
						<a href="<?=base_url('kelasdosen')?>">
							<i class="fa fa-circle-o"></i>
							Kelas - Pembimbing
						</a>
					</li>
					<li class="<?=$page==='jurusanmatkul'?"active":""?>">
						<a href="<?=base_url('jurusanmatkul')?>">
							<i class="fa fa-circle-o"></i>
							Jurusan - Mata Pelajaran
						</a>
					</li>
				</ul>
			</li>
			<?php endif; ?>
			<?php if( $this->ion_auth->is_admin() || $this->ion_auth->in_group('pembimbing') ) : ?>
			<li class="<?=$page==='soal'?"active":""?>">
				<a href="<?=base_url('soal')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if( $this->ion_auth->in_group('pembimbing') ) : ?>
			<li class="<?=$page==='ujian'?"active":""?>">
				<a href="<?=base_url('ujian/master')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Ujian</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if( $this->ion_auth->in_group('peserta') ) : ?>
			<li class="<?=$page==='ujian'?"active":""?>">
				<a href="<?=base_url('ujian/list')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Ujian</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if( !$this->ion_auth->in_group('peserta') ) : ?>
			<li class="header">REPORTS</li>
			<li class="<?=$page==='hasilujian'?"active":""?>">
				<a href="<?=base_url('hasilujian')?>" rel="noopener noreferrer">
					<i class="fa fa-file"></i> <span>Hasil Ujian</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if($this->ion_auth->is_admin()) : ?>
			<li class="header">ADMINISTRATOR</li>
			<li class="<?=$page==='users'?"active":""?>">
				<a href="<?=base_url('users')?>" rel="noopener noreferrer">
					<i class="fa fa-users"></i> <span>User Management</span>
				</a>
			</li>
			<!--<li class="<?=$page==='settings'?"active":""?>">
				<a href="<?=base_url('settings')?>" rel="noopener noreferrer">
					<i class="fa fa-cog"></i> <span>Pengaturan</span>
				</a>
			</li>-->
			<?php endif; ?>
		</ul>

	</section>
	<!-- /.sidebar -->
</aside>