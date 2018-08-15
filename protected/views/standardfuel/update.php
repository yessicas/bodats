<?php
$this->breadcrumbs=array(
	'Standard Fuels'=>array('index'),
	$model->id_standard_fuel=>array('view','id'=>$model->id_standard_fuel),
	'Update',
);

	$this->menu=array(
	array('label'=>'List StandardFuel','url'=>array('index')),
	array('label'=>'Create StandardFuel','url'=>array('create')),
	array('label'=>'View StandardFuel','url'=>array('view','id'=>$model->id_standard_fuel)),
	array('label'=>'Manage StandardFuel','url'=>array('admin')),
	);
	?>

	<h2>Update StandardFuel <?php echo $model->id_standard_fuel; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>