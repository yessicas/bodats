<?php
$this->breadcrumbs=array(
	'Mst Timesheet Summaries'=>array('index'),
	$model->id_mst_timesheet_summary=>array('view','id'=>$model->id_mst_timesheet_summary),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstTimesheetSummary','url'=>array('index')),
	array('label'=>'Manage MstTimesheetSummary','url'=>array('master/times')),
array('label'=>'Create MstTimesheetSummary','url'=>array('master/timescreate')),
array('label'=>'View MstTimesheetSummary','url'=>array('master/timesview','id'=>$model->id_mst_timesheet_summary)),
array('label'=>'Update MstTimesheetSummary','url'=>array('master/timesupdate','id'=>$model->id_mst_timesheet_summary),'active'=>true),
array('label'=>'Delete Timesheet Summary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mst_timesheet_summary),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>

	<h3>Update Timesheet Summary<font color=#BD362F> <?php echo $model->timesheet_summary; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../MstTimesheetSummary/_form',array('model'=>$model)); ?>