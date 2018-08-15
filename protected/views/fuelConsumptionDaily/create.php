<?php
$this->breadcrumbs=array(
	'Fuel Consumption Dailies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Fuel Consumption Daily','url'=>array('admin')),
array('label'=>'Create Fuel Consumption Daily','url'=>array('create')),

);
?>

<h3>Add ROB Status</h3>
<hr>

<?php echo $this->renderPartial('../FuelConsumptionDaily/_form', array('model'=>$model)); ?>