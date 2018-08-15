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

	
<h3>Update Fuel Price # <font color="#BD362F"> <?php echo $model->fuel; ?></font></h3>
<hr>

<?php echo $this->renderPartial('_form_fuel',array('model'=>$model)); ?>