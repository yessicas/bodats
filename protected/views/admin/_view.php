<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_data_diri')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_data_diri),array('view','id'=>$data->id_data_diri)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ektp')); ?>:</b>
	<?php echo CHtml::encode($data->id_ektp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_ktp')); ?>:</b>
	<?php echo CHtml::encode($data->no_ktp); ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />
-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_lengkap')); ?>:</b>
	<?php echo CHtml::encode($data->nama_lengkap); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_depan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_depan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_tengah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_tengah); ?>
	<br />

	<b> <?php echo CHtml::encode($data->getAttributeLabel('nama_belakang')); ?>:</b>
	<?php echo CHtml::encode($data->nama_belakang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_panggilan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_panggilan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('niw')); ?>:</b>
	<?php echo CHtml::encode($data->niw); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat1')); ?>:</b>
	<?php echo CHtml::encode($data->alamat1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat2')); ?>:</b>
	<?php echo CHtml::encode($data->alamat2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wilayah')); ?>:</b>
	<?php echo CHtml::encode($data->wilayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telepon')); ?>:</b>
	<?php echo CHtml::encode($data->telepon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('handphone')); ?>:</b>
	<?php echo CHtml::encode($data->handphone); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_tahun_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_tahun_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama')); ?>:</b>
	<?php echo CHtml::encode($data->agama); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_pernikahan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_pernikahan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_pernikahan')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_pernikahan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_akte_nikah')); ?>:</b>
	<?php echo CHtml::encode($data->no_akte_nikah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinikahkan_oleh')); ?>:</b>
	<?php echo CHtml::encode($data->dinikahkan_oleh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note_kondisi_warga')); ?>:</b>
	<?php echo CHtml::encode($data->note_kondisi_warga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_wafat')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_wafat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_pemakaman')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_pemakaman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimakamkan_oleh')); ?>:</b>
	<?php echo CHtml::encode($data->dimakamkan_oleh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('warga_titipan')); ?>:</b>
	<?php echo CHtml::encode($data->warga_titipan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_surat_wt')); ?>:</b>
	<?php echo CHtml::encode($data->no_surat_wt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_status_warga')); ?>:</b>
	<?php echo CHtml::encode($data->no_status_warga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_atestasi')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_atestasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asal_atestasi')); ?>:</b>
	<?php echo CHtml::encode($data->asal_atestasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_surat_atestasi')); ?>:</b>
	<?php echo CHtml::encode($data->no_surat_atestasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_masuk_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_masuk_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_masuk_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_masuk_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kepala_saat_masuk_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->kepala_saat_masuk_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_induk_masuk_sekolah')); ?>:</b>
	<?php echo CHtml::encode($data->no_induk_masuk_sekolah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_kuliah')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_kuliah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_kuliah')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_kuliah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kepala_tempat_kuliah')); ?>:</b>
	<?php echo CHtml::encode($data->kepala_tempat_kuliah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_surat_kuliah')); ?>:</b>
	<?php echo CHtml::encode($data->no_surat_kuliah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->status_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tingkat_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->tingkat_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fakultas_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->fakultas_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesi_detail')); ?>:</b>
	<?php echo CHtml::encode($data->profesi_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesi_alamat')); ?>:</b>
	<?php echo CHtml::encode($data->profesi_alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesi_telepon')); ?>:</b>
	<?php echo CHtml::encode($data->profesi_telepon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesi_email')); ?>:</b>
	<?php echo CHtml::encode($data->profesi_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_nama_kantor')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_nama_kantor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_bidang_usaha')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_bidang_usaha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_jabatan_kantor')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_jabatan_kantor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_alamat_kantor')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_alamat_kantor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_email_kantor')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_email_kantor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelayanan_1')); ?>:</b>
	<?php echo CHtml::encode($data->pelayanan_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelayanan_2')); ?>:</b>
	<?php echo CHtml::encode($data->pelayanan_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelayanan_3')); ?>:</b>
	<?php echo CHtml::encode($data->pelayanan_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelayanan_4')); ?>:</b>
	<?php echo CHtml::encode($data->pelayanan_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelayanan_5')); ?>:</b>
	<?php echo CHtml::encode($data->pelayanan_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minat_hobi')); ?>:</b>
	<?php echo CHtml::encode($data->minat_hobi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bakat_potensi')); ?>:</b>
	<?php echo CHtml::encode($data->bakat_potensi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu_kandung')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu_kandung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ibu_kandung')); ?>:</b>
	<?php echo CHtml::encode($data->id_ibu_kandung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah_kandung')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah_kandung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ayah_kandung')); ?>:</b>
	<?php echo CHtml::encode($data->id_ayah_kandung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontak_keluarga')); ?>:</b>
	<?php echo CHtml::encode($data->kontak_keluarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_keluarga')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_keluarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telepon_keluarga')); ?>:</b>
	<?php echo CHtml::encode($data->no_telepon_keluarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memo')); ?>:</b>
	<?php echo CHtml::encode($data->memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_update')); ?>:</b>
	<?php echo CHtml::encode($data->last_update); ?>
	<br />

-->

</div>