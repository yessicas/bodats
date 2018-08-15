
<?php
//$model=DataDiri::model()->findByAttributes(array('userid'=>$id));

$this->breadcrumbs=array(
	 Yii::t('strings','Profile')=>array('view'),
	Yii::t('strings','Upload Photo'),
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
<h4><?php echo Yii::t('strings','Upload Photo')?>   <?php echo $model->userid; ?></h4>
</div>

<div class="view">

<?php

	if($model->Photo != ""){
		$file = 'repository/users/'.$model->Photo;
		if(file_exists($file)){
			/*
			echo '<div class="alert alert-block alert-error">File sebelumnya sudah ada dengan nama <b>'.CHtml::link($model->foto, $model->foto).'</b>.<br>
			Silahkan lanjut jika anda yakin ingin menggantikan file tersebut!</div>'."\n";
			*/
			echo '<div class="alert alert-block alert-error">'.Yii::t('strings','Previously existing file with the name').', '.Yii::t('strings','next if you are sure you want to replace the file!').'</div>'."\n";
		}else{
			
		}
	}

?>

<?php 
	$url = Yii::app()->createUrl("crew/unggah");
	echo CHtml::form($url,'post',array('enctype'=>'multipart/form-data')); 
?>
<div id="msg"><?php echo Yii::t('strings','choose your file') ?></div>
<?php echo CHtml::activeFileField($model, 'foto', array('size'=>'50')); ?>
<?php echo CHtml::error($model,'foto'); ?>

<br>
<?php echo CHtml::submitButton(Yii::t('strings','Save'),array('class'=>"btn btn-primary")); ?>

<?php echo CHtml::endForm(); ?>
</div>  

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/css/filevalidatorjs/fotovalidator.js"); ?>