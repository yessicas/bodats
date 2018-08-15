<?php
$this->breadcrumbs=array(
	'Fuel Consumption Dailies'=>array('index'),
	$model->id_fuel_consumption_daily=>array('view','id'=>$model->id_fuel_consumption_daily),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List FuelConsumptionDaily','url'=>array('index')),
	array('label'=>'Manage Fuel Consumption Daily','url'=>array('admin')),
	array('label'=>'Create Fuel Consumption Daily','url'=>array('create')),
	array('label'=>'View Fuel Consumption Daily','url'=>array('view','id'=>$model->id_fuel_consumption_daily)),
	array('label'=>'Update Fuel Consumption Daily','url'=>array('update','id'=>$model->id_fuel_consumption_daily)),
	
	);
	?>

	<h3>Update Fuel Consumption Daily<font color=#BD362F> 
		<br><?php echo $model->idVessel->VesselName; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../FuelConsumptionDaily/_form',array('model'=>$model)); ?>