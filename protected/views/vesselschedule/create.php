<?php
$this->breadcrumbs=array(
	'Vessel Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'Create Vessel Schedule', 'url'=>array('vesopr/schedulecreate')),
    array('label'=>'Manage Vessel Schedule', 'url'=>array('vesopr/schedule')),
    
);
?>
<div id="content">
<h2>Create VesselSchedule</h2>
<hr>
</div>


<?php echo $this->renderPartial('../vesselschedule/_form', array('model'=>$model)); ?>