<?php
$model=MemberArticle::model()->findByPk($id);
$this->breadcrumbs=array(
	'Article'=>array('mylist'),
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
<h4>Unggah Foto Article <?php echo $model->Title; ?></h4>
</div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Title',
	),
)); */?>
<div class="view">

<?php
	if($model->foto != ""){
		$file = 'repository/article/'.$model->foto;
		if(file_exists($file)){
			echo '<div class="alert alert-block alert-error">File sebelumnya sudah ada dengan nama <b>'.CHtml::link($model->foto, $model->foto).'</b>.<br>
			Silakan lanjut jika anda yakin ingin menggantikan file tersebut!</div>'."\n";
		}else{
			
		}
	}
?>

<?php 
	$url = Yii::app()->createUrl("editorial/unggah");
	echo CHtml::form($url,'post',array('enctype'=>'multipart/form-data')); 
?>
<div id="msg">Silakan pilih file yang akan diunggah:</div>
<?php echo CHtml::activeHiddenField($model, 'IDArticle', array('size'=>'50')); ?>
<?php echo CHtml::activeHiddenField($model, 'articlecode', array('size'=>'50')); ?>
<?php echo CHtml::activeFileField($model, 'foto', array('size'=>'50')); ?>
<?php echo CHtml::error($model,'foto'); ?>

<br>
<?php echo CHtml::submitButton(Yii::t('strings','Save'),array('class'=>"btn btn-primary")); ?>
<?php echo CHtml::endForm(); ?>
</div>  


