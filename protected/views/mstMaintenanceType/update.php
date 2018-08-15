<?php
$this->breadcrumbs=array(
	'Mst Maintenance Types'=>array('index'),
	$model->id_maintenance_type=>array('view','id'=>$model->id_maintenance_type),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MstMaintenanceType','url'=>array('index')),
	array('label'=>'Create MstMaintenanceType','url'=>array('create')),
	array('label'=>'View MstMaintenanceType','url'=>array('view','id'=>$model->id_maintenance_type)),
	array('label'=>'Manage MstMaintenanceType','url'=>array('admin')),
	);
	?>
<div id="content">
	<h2>Update MstMaintenanceType<font color=#BD362F> <?php echo $model->id_maintenance_type; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../<?php echo MstMaintenanceType; ?>/_form',array('model'=>$model)); ?>