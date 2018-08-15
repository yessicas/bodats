<?php
$this->breadcrumbs=array(
	'Vessel Maintenance Plans'=>array('index'),
	$model->id_vessel_maintenance_plan=>array('view','id'=>$model->id_vessel_maintenance_plan),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List VesselMaintenancePlan','url'=>array('index')),
	array('label'=>'Update Vessel Maintenance Plan','url'=>array('repair/updateplan','id'=>$model->id_vessel_maintenance_plan)),
	array('label'=>'Create Vessel Maintenance Plan','url'=>array('repair/plancreate')),
	array('label'=>'View Vessel Maintenance Plan','url'=>array('repair/viewplan','id'=>$model->id_vessel_maintenance_plan)),
	array('label'=>'Manage Vessel Maintenance Plan','url'=>array('repair/plan')),
	);
	?>


<div id="content">
<h2>Update Vessel Maintenance Plan # <font color="#BD362F"><?php echo $model->MaintenanceName; ?></font></h2>
<hr>
</div>

<?php echo $this->renderPartial('../vesselmaintenanceplan/_form',array('model'=>$model)); ?>