<?php
$this->breadcrumbs=array(
	'Fuel Price Histories'=>array('index'),
	$model->id_fuel_price_history=>array('view','id'=>$model->id_fuel_price_history),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FuelPriceHistory','url'=>array('index')),
	array('label'=>'Create FuelPriceHistory','url'=>array('create')),
	array('label'=>'View FuelPriceHistory','url'=>array('view','id'=>$model->id_fuel_price_history)),
	array('label'=>'Manage FuelPriceHistory','url'=>array('admin')),
	);
	?>

	<h2>Update FuelPriceHistory <?php echo $model->id_fuel_price_history; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>