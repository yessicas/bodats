<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'data-warga-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i>Isian Dengan Tanda  <span class="required">*</span> Tidak Boleh Kosong</i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<table>

	<tr>
	<td>
		<b><u>Identitas Lengkap </u></b>
	</td>
	</tr>
	
	<tr>
	<td>
	<?php //echo $form->hiddenField($model,'id_data_diri',array('class'=>'span3')); ?>
	<?php //echo $form->textFieldRow($model,'userid',array('class'=>'span3','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'id_ektp',array('class'=>'span3','maxlength'=>30)); ?>

	<?php //echo $form->hiddenField($model,'foto',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_depan',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_tengah',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_belakang',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_panggilan',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'alamat1',array('rows'=>6, 'cols'=>50, 'class'=>'span4')); ?>

	<?php echo $form->textAreaRow($model,'alamat2',array('rows'=>6, 'cols'=>50, 'class'=>'span4')); ?>

	<?php echo $form->dropDownListRow($model,'jenis_kelamin',array(1=>'Laki - Laki', 2=>'Perempuan'),
    array('prompt'=>'--Pilih --','class'=>'span2'));?>

	</td>
	</tr>

	</table>

	<table>	

	<tr>
	<td>
	<?php echo $form->textFieldRow($model,'niw',array('class'=>'span2','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'email',array('class'=>'span2','maxlength'=>30)); ?>
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo '<div style="margin-bottom:20px;"><b>'.$model->email.'</b></div>'; ?>

	<?php echo $form->dropDownListRow($model,'wilayah',array('Barat'=>'Barat', 'Timur'=>'Timur', 'Utara'=>'Utara', 'Selatan'=>'Selatan'),
    array('prompt'=>'--Pilih --','class'=>'span2'));?>
	</td>

	<td>
	<?php echo $form->textFieldRow($model,'no_ktp',array('class'=>'span2','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'telepon',array('class'=>'span2','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'tempat_lahir',array('class'=>'span2','maxlength'=>50)); ?>
	</td>

	<td>
	<?php echo $form->dropDownListRow($model,'agama',array('Islam'=>'Islam', 'Kristen'=>'Kristen', 'Budha'=>'Budha', 'Hindu'=>'Hindu', 'Lainnya'=>'Lainnya'),
    array('prompt'=>'--Pilih --','class'=>'span2'));?>

	<?php echo $form->textFieldRow($model,'handphone',array('class'=>'span2','maxlength'=>15)); ?>

	<?php echo $form->labelEx($model,'tanggal_tahun_lahir'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'tanggal_tahun_lahir',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'dd-mm-yy',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'tanggal_tahun_lahir'); ?>
	</td>
	</tr>

	</table>



	<table>
	<tr>
	<td colspan=2>
		<b><u>Data Orang Tua</u></b>
	</td>
	</tr>
	
	<tr>
	<td>
	<?php echo $form->textFieldRow($model,'nama_ibu_kandung',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_ayah_kandung',array('class'=>'span3','maxlength'=>50)); ?>
	</td>

	<td>
	
	<?php echo $form->textFieldRow($model,'niw_ibu_kandung',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'niw_ayah_kandung',array('class'=>'span3','maxlength'=>50)); ?>


	</td>
	</tr>
	</table>


	<table>
	<tr style='width:100px'>
	<td colspan=2>
		<b><u>Keluarga / Kerabat yang bisa dihubungi</u></b>
	</td>
	</tr>
	
	<tr style='width:100px'>
	<td colspan=2>
	<?php echo $form->textFieldRow($model,'kontak_keluarga',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'alamat_keluarga',array('class'=>'span3','maxlength'=>50)); ?>
	</td>
	</tr>

	<tr style='width:100px'>
	<td>
	<?php echo $form->textFieldRow($model,'no_telepon_keluarga',array('class'=>'span3','maxlength'=>20)); ?>
	</td>
	<td>
	<?php echo $form->textFieldRow($model,'hubungan_keluarga',array('class'=>'span3','maxlength'=>20)); ?>
	</td>
	</tr>

	</table>


	<?php echo $form->hiddenField($model,'tanggal_pernikahan',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'tempat_pernikahan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'no_akte_nikah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'dinikahkan_oleh',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'note_kondisi_warga',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'tanggal_wafat',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'tempat_pemakaman',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'dimakamkan_oleh',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'warga_titipan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'no_surat_wt',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'no_status_warga',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'tanggal_atestasi',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'asal_atestasi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'no_surat_atestasi',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'tanggal_masuk_sekolah',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'tempat_masuk_sekolah',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'kepala_saat_masuk_sekolah',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'no_induk_masuk_sekolah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'tanggal_kuliah',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'tempat_kuliah',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'kepala_tempat_kuliah',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'no_surat_kuliah',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'status_pendidikan',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->hiddenField($model,'tingkat_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'fakultas_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'tempat_pendidikan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'profesi_detail',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'profesi_alamat',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'profesi_telepon',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->hiddenField($model,'profesi_email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pekerjaan_nama_kantor',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pekerjaan_bidang_usaha',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pekerjaan_jabatan_kantor',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pekerjaan_alamat_kantor',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pekerjaan_email_kantor',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pelayanan_1',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pelayanan_2',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pelayanan_3',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pelayanan_4',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'pelayanan_5',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'minat_hobi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'bakat_potensi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'memo',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->hiddenField($model,'id_ibu_kandung',array('class'=>'span4')); ?>

	<?php echo $form->hiddenField($model,'id_ayah_kandung',array('class'=>'span4')); ?>

	<?php echo $form->hiddenField($model,'last_update',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>
</div>
<?php $this->endWidget(); ?>

