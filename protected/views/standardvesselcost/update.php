<?php
$this->breadcrumbs=array(
	'Standard Vessel Costs'=>array('index'),
	$model->id_standard_vessel_cost=>array('view','id'=>$model->id_standard_vessel_cost),
	'Update',
);

	$this->menu=array(
	array('label'=>'List StandardVesselCost','url'=>array('index')),
	array('label'=>'Create StandardVesselCost','url'=>array('create')),
	array('label'=>'View StandardVesselCost','url'=>array('view','id'=>$model->id_standard_vessel_cost)),
	array('label'=>'Manage StandardVesselCost','url'=>array('admin')),
	);
	?>

	<h2>Update StandardVesselCost <?php echo $model->id_standard_vessel_cost; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>