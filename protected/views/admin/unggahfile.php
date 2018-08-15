<?php
//$model=DataDiri::model()->findByAttributes(array('userid'=>$id));

$this->breadcrumbs=array(
	'Data Diri'=>array('view'),
	'Unggah Foto',
);
/*
$this->menu=array(
	array('label'=>'List Perusahaan', 'url'=>array('index')),
	array('label'=>'Daftar Anggota', 'url'=>array('daftar')),
	array('label'=>'Unduh Form', 'url'=>array('unduh')),
	array('label'=>'Upload Form', 'url'=>array('daftar')),
	array('label'=>'Pengajuan SKVI', 'url'=>array('daftar')),
);
*/
?>

<div class="well">
<h4>Unggah Foto Profil  <?php echo $model->userid; ?></h4>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nama_lengkap',
		'nama_panggilan',
		///'jenis_kelamin',
		array(
		'name' => 'jenis_kelamin',
		'type' => 'raw',
		'value' => CHtml::encode($model->getjk()),
		),
	),
)); ?>
<br>
<div class="view">

<?php

	if($model->foto != ""){
		$file = 'repository/users/'.$model->foto;
		if(file_exists($file)){
			echo '<div class="alert alert-block alert-error">File sebelumnya sudah ada dengan nama <b>'.CHtml::link($model->foto, $model->foto).'</b>.<br>
			Silahkan lanjut jika anda yakin ingin menggantikan file tersebut!</div>'."\n";
		}else{
			
		}
	}

?>

<?php 
	$url = Yii::app()->createUrl("datadiri/unggah");
	echo CHtml::form($url,'post',array('enctype'=>'multipart/form-data')); 
?>
<div id="msg">Silakan pilih file yang akan diunggah:</div>
<?php echo CHtml::activeFileField($model, 'foto', array('size'=>'50')); ?>
<?php echo CHtml::error($model,'foto'); ?>

<br>
<?php echo CHtml::submitButton('Simpan',array('class'=>"btn btn-primary")); ?>

<?php echo CHtml::endForm(); ?>
</div>  


