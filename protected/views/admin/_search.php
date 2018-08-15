<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_data_diri',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_ektp',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'no_ktp',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_depan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_tengah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_belakang',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_panggilan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'niw',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'jenis_kelamin',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'alamat1',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'alamat2',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'wilayah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'telepon',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'handphone',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'tempat_lahir',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_tahun_lahir',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agama',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_pernikahan',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tempat_pernikahan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_akte_nikah',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'dinikahkan_oleh',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'note_kondisi_warga',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_wafat',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tempat_pemakaman',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'dimakamkan_oleh',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'warga_titipan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_surat_wt',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'no_status_warga',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_atestasi',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'asal_atestasi',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_surat_atestasi',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_masuk_sekolah',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tempat_masuk_sekolah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'kepala_saat_masuk_sekolah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_induk_masuk_sekolah',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'tanggal_kuliah',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tempat_kuliah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'kepala_tempat_kuliah',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_surat_kuliah',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'status_pendidikan',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'tingkat_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'fakultas_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'tempat_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'profesi_detail',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'profesi_alamat',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'profesi_telepon',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'profesi_email',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pekerjaan_nama_kantor',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pekerjaan_bidang_usaha',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pekerjaan_jabatan_kantor',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pekerjaan_alamat_kantor',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pekerjaan_email_kantor',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pelayanan_1',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pelayanan_2',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pelayanan_3',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pelayanan_4',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'pelayanan_5',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'minat_hobi',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'bakat_potensi',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'nama_ibu_kandung',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'id_ibu_kandung',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nama_ayah_kandung',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'id_ayah_kandung',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'kontak_keluarga',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'alamat_keluarga',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'no_telepon_keluarga',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'memo',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'last_update',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
