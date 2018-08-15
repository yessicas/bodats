<?php
$this->breadcrumbs=array(
	'Fuel Transaction Types'=>array('index'),
	$model->id_fuel_transaction_type=>array('view','id'=>$model->id_fuel_transaction_type),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List FuelTransactionType','url'=>array('index')),
	array('label'=>'Manage FuelTransactionType','url'=>array('master/masfuel')),
array('label'=>'Create FuelTransactionType','url'=>array('master/masfuelcreate')),
array('label'=>'View FuelTransactionType','url'=>array('view','id'=>$model->id_fuel_transaction_type)),
array('label'=>'Update FuelTransactionType','url'=>array('update','id'=>$model->id_fuel_transaction_type),'active'=>true),

array('label'=>'Delete FuelTransactionType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuel_transaction_type),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>

	<h3>Update Fuel Transaction Type<font color=#BD362F> <?php echo $model->fuel_transaction_type; ?></font></h2>
		<hr>

<?php echo $this->renderPartial('../FuelTransactionType/_form',array('model'=>$model)); ?>