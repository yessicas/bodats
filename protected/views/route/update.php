<?php
$this->breadcrumbs=array(
	'Routes'=>array('index'),
	$model->RouteId=>array('view','id'=>$model->RouteId),
	'Update',
);

	$this->menu=array(
	array('label'=>'Update Route','url'=>array('entity/entirouteupdate','id'=>$model->RouteId)),
	array('label'=>'Create Route','url'=>array('entity/entiroutecreate')),
	array('label'=>'View Route','url'=>array('entity/entirouteview','id'=>$model->RouteId)),
	array('label'=>'Manage Route','url'=>array('entity/entiroute')),
	);
	?>

	<h2>Update Route <font color="#BD362F"> <?php echo $model->Place_first; ?></font></h2>
	<hr>

<?php echo $this->renderPartial('../route/_form',array('model'=>$model)); ?>