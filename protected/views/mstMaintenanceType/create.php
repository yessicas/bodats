<?php
$this->breadcrumbs=array(
	'Mst Maintenance Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create MstMaintenanceType','url'=>array('create')),
array('label'=>'Manage MstMaintenanceType','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create MstMaintenanceType</h2>
<hr>
</div>


<?php echo $this->renderPartial('../<?php echo MstMaintenanceType; ?>/_form', array('model'=>$model)); ?>