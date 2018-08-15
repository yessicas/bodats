<?php
$this->breadcrumbs=array(
	'Timesheet Summaries'=>array('index'),
	$model->id_timesheet_summary=>array('view','id'=>$model->id_timesheet_summary),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TimesheetSummary','url'=>array('index')),
	array('label'=>'Create TimesheetSummary','url'=>array('create')),
	array('label'=>'View TimesheetSummary','url'=>array('view','id'=>$model->id_timesheet_summary)),
	array('label'=>'Manage TimesheetSummary','url'=>array('admin')),
	);
	?>

	<h1>Update TimesheetSummary <?php echo $model->id_timesheet_summary; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>