<?php
$this->breadcrumbs=array(
	'Mst Timesheet Summaries'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Timesheet Summary','url'=>array('master/times')),
array('label'=>'Create Timesheet Summary','url'=>array('master/timescreate'),'active'=>true),

);
?>
<div id="content">
<h2>Create Timesheet Summary</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstTimesheetSummary/_form', array('model'=>$model)); ?>