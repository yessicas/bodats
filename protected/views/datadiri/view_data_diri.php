
<br>
<div class="view">
<table class="table_border_null">
<tr>
	<td colspan = 3>
		<b>Identitas Lengkap </b>
		<hr>
	</td>
	</tr>

	<tr>
		<td style='width:170px'><b>Nama Depan </b></td><td style='width:10px'>:</td><td ><?php echo $model->nama_depan ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Nama Tengah</b> </td><td style='width:10px'>:</td><td ><?php echo $model->nama_tengah ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Nama Belakang </b></td><td style='width:10px'>:</td><td ><?php echo $model->nama_belakang ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Nama Panggilan </b></td><td style='width:10px'>:</td><td ><?php echo $model->nama_panggilan ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Alamat 1</b> </td><td style='width:10px'>:</td><td ><?php echo $model->alamat1 ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Alamat 2</b> </td><td style='width:10px'>:</td><td ><?php echo $model->alamat2 ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Jenis Kelamin </b></td><td style='width:10px'>:</td><td ><?php echo $model->jenis_kelamin ?></td>
	</tr>
</table>

<table class="table_border_null">	

	<tr>
	
	<td style='width:170px'><b>NIW</b> </td><td style='width:10px'>:</td><td ><?php echo $model->niw ?></td>
	<td style='width:170px'><b>No KTP</b> </td><td style='width:10px'>:</td><td ><?php echo $model->no_ktp ?></td>
	<td style='width:170px'><b>Agama </b></td><td style='width:10px'>:</td><td ><?php echo $model->agama ?></td>
	
	</tr>

	<tr>
	
	<td style='width:170px'><b>Email</b> </td><td style='width:10px'>:</td><td ><?php echo $model->email ?></td>
	<td style='width:170px'><b>Telepon</b> </td><td style='width:10px'>:</td><td ><?php echo $model->telepon ?></td>	
	<td style='width:170px'><b>Handphone</b> </td><td style='width:10px'>:</td><td ><?php echo $model->handphone ?></td>
	
	</tr>

	<tr>
	
	<td style='width:170px'><b>Wilayah Jemaat</b> </td><td style='width:10px'>:</td><td ><?php echo $model->wilayah ?></td>
	<td style='width:170px'><b>Kota Lahir </b></td><td style='width:10px'>:</td><td ><?php echo $model->tempat_lahir ?></td>	
	<td style='width:170px'><b>Tanggal Lahir</b> </td><td style='width:10px'>:</td><td ><?php echo $model->tanggal_tahun_lahir ?></td>
	
	</tr>

</table class="table_border_null">

<table>
	<tr>
	<td colspan=2>
		<b>Data Orang Tua</b>
		<hr>
	</td>
	</tr>
	
	<tr>
	<td style='width:170px'><b>Nama Ibu Kandung</b> </td><td style='width:10px'>:</td><td ><?php echo $model->nama_ibu_kandung ?></td>
	<td style='width:170px'><b>Niw Ibu Kandung</b> </td><td style='width:10px'>:</td><td ><?php echo $model->niw_ibu_kandung ?></td>
	</tr>
	
	<tr>
	<td style='width:170px'><b>Nama Ayah Kandung</b> </td><td style='width:10px'>:</td><td ><?php echo $model->nama_ayah_kandung ?></td>
	<td style='width:170px'><b>Niw Ayah Kandung</b> </td><td style='width:10px'>:</td><td ><?php echo $model->niw_ayah_kandung ?></td>
	</tr>

</table>

<table class="table_border_null">
<tr>
	<td colspan = 3>
		<b>Keluarga / Kerabat yang bisa dihubungi</b>
		<hr>
	</td>
	</tr>

	<tr>
		<td style='width:170px'><b>Nama Keluarga / Kerabat</b> </td><td style='width:10px'>:</td><td ><?php echo $model->kontak_keluarga ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Alamat Keluarga / Kerabat</b> </td><td style='width:10px'>:</td><td ><?php echo $model->alamat_keluarga ?></td>
	</tr>
	<tr>
		<td style='width:170px'><b>Telepon Keluarga / Kerabat</b> </td><td style='width:10px'>:</td><td ><?php echo $model->no_telepon_keluarga ?></td>
		<td style='width:250px'><b>Hubungan Keluarga / Kerabat </b></td><td style='width:10px'>:</td><td ><?php echo $model->hubungan_keluarga ?></td>
	
	</tr>
	
</table>
</div>

Diperbaharui Pada : <?php echo $model->last_update ?>

<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_data_diri',
		'id_ektp',
		'no_ktp',
	),
)); ?>
-->

<!--
<br>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'type' => 'striped bordered condensed',
'data'=>$model,
'attributes'=>array(
		'id_data_diri',
		'id_ektp',
		'no_ktp',
		'foto',
		'nama_lengkap',
		'nama_depan',
		'nama_tengah',
		'nama_belakang',
		'nama_panggilan',
		'niw',
		'jenis_kelamin',
		'alamat1',
		'alamat2',
		'wilayah',
		'email',
		'telepon',
		'handphone',
		'tempat_lahir',
		'tanggal_tahun_lahir',
		'agama',
		'tanggal_pernikahan',
		'tempat_pernikahan',
		'no_akte_nikah',
		'dinikahkan_oleh',
		'note_kondisi_warga',
		'tanggal_wafat',
		'tempat_pemakaman',
		'dimakamkan_oleh',
		'warga_titipan',
		'no_surat_wt',
		'no_status_warga',
		'tanggal_atestasi',
		'asal_atestasi',
		'no_surat_atestasi',
		'tanggal_masuk_sekolah',
		'tempat_masuk_sekolah',
		'kepala_saat_masuk_sekolah',
		'no_induk_masuk_sekolah',
		'tanggal_kuliah',
		'tempat_kuliah',
		'kepala_tempat_kuliah',
		'no_surat_kuliah',
		'status_pendidikan',
		'tingkat_pendidikan',
		'fakultas_pendidikan',
		'tempat_pendidikan',
		'profesi_detail',
		'profesi_alamat',
		'profesi_telepon',
		'profesi_email',
		'pekerjaan_nama_kantor',
		'pekerjaan_bidang_usaha',
		'pekerjaan_jabatan_kantor',
		'pekerjaan_alamat_kantor',
		'pekerjaan_email_kantor',
		'pelayanan_1',
		'pelayanan_2',
		'pelayanan_3',
		'pelayanan_4',
		'pelayanan_5',
		'minat_hobi',
		'bakat_potensi',
		'nama_ibu_kandung',
		'id_ibu_kandung',
		'niw_ibu_kandung',
		'nama_ayah_kandung',
		'id_ayah_kandung',
		'niw_ayah_kandung',
		'kontak_keluarga',
		'alamat_keluarga',
		'no_telepon_keluarga',
		'hubungan_keluarga',
		'memo',
		'last_update',
),
)); ?>
-->