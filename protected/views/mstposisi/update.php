<?php
$this->breadcrumbs=array(
	'Mst Posisis'=>array('index'),
	$model->id_posisi=>array('view','id'=>$model->id_posisi),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MstPosisi','url'=>array('index')),
	array('label'=>'Create MstPosisi','url'=>array('create')),
	array('label'=>'View MstPosisi','url'=>array('view','id'=>$model->id_posisi)),
	array('label'=>'Manage MstPosisi','url'=>array('admin')),
	);
	?>
<div class="well">
<h3><?php echo Yii::t('strings','Update') ?> <?php echo Yii::t('strings','Data Position') ?> <?php echo $model->nama_posisi; ?></h3>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>