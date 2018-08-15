<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->id_country=>array('view','id'=>$model->id_country),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
	array('label'=>'Create Country','url'=>array('create')),
	array('label'=>'View Country','url'=>array('view','id'=>$model->id_country)),
	array('label'=>'Manage Country','url'=>array('admin')),
	);
	?>

	<div class="well">
<h3><?php echo Yii::t('strings','Update') ?> Data Country <?php echo $model->country_name; ?></h3>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>