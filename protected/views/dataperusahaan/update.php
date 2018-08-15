<?php
$this->breadcrumbs=array(
	'Data Perusahaan'=>array('index'),
	$model->nama_perusahaan=>array('view','id'=>$model->id_perusahaan),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DataPerusahaan','url'=>array('index')),
	array('label'=>'Create DataPerusahaan','url'=>array('create')),
	array('label'=>'View DataPerusahaan','url'=>array('view','id'=>$model->id_perusahaan)),
	array('label'=>'Manage DataPerusahaan','url'=>array('admin')),
	);
	?>

	<div class="well">
<h4><?php echo Yii::t('strings','Update') ?> <?php echo Yii::t('strings','Company Data') ?> <?php echo $model->nama_perusahaan ?> </h4>
<hr>

</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>