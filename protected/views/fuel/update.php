<?php
$this->breadcrumbs=array(
	'Fuels'=>array('index'),
	$model->id_fuel=>array('view','id'=>$model->id_fuel),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Fuel','url'=>array('index')),
	array('label'=>'Create Fuel','url'=>array('create')),
	array('label'=>'View Fuel','url'=>array('view','id'=>$model->id_fuel)),
	array('label'=>'Manage Fuel','url'=>array('admin')),
	);
	?>

	<h2>Update Fuel <?php echo $model->id_fuel; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>