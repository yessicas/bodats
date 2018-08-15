<?php
$this->breadcrumbs=array(
	'Vessel Maintenance Plans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Vessel Maintenance Plan','url'=>array('repair/plan')),
array('label'=>'Create Vessel Maintenance Plan','url'=>array('repair/plancreate')),
array('label'=>'Approved Vessel Maintenance Plan','url'=>array('repair/plan','status'=>'APPROVED')),
array('label'=>'Rejected Vessel Maintenance Plan','url'=>array('repair/plan','status'=>'REJECTED')),
);
?>

<div id="content">
<h2>Create Vessel Maintenance Plan</h2>
<hr>
</div>


<?php echo $this->renderPartial('../vesselmaintenanceplan/_form', array('model'=>$model)); ?>