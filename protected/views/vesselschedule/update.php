<?php
$this->breadcrumbs=array(
	'Vessel Schedules'=>array('index'),
	$model->id_vessel_schedule=>array('view','id'=>$model->id_vessel_schedule),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VesselSchedule','url'=>array('index')),
	array('label'=>'Create VesselSchedule','url'=>array('create')),
	array('label'=>'View VesselSchedule','url'=>array('view','id'=>$model->id_vessel_schedule)),
	array('label'=>'Manage VesselSchedule','url'=>array('admin')),
	);
	?>

	<h2>Update VesselSchedule <?php echo $model->id_vessel_schedule; ?></h2>
	<hr>

<?php echo $this->renderPartial('../vesselschedule/_form',array('model'=>$model)); ?>