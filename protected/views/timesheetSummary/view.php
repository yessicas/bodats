<?php
$this->breadcrumbs=array(
	'Timesheet Summaries'=>array('index'),
	$model->id_timesheet_summary,
);

$this->menu=array(
array('label'=>'List TimesheetSummary','url'=>array('index')),
array('label'=>'Create TimesheetSummary','url'=>array('create')),
array('label'=>'Update TimesheetSummary','url'=>array('update','id'=>$model->id_timesheet_summary)),
array('label'=>'Delete TimesheetSummary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_timesheet_summary),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TimesheetSummary','url'=>array('admin')),
);
?>

<h1>View TimesheetSummary #<?php echo $model->id_timesheet_summary; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_timesheet_summary',
		'id_voyage_order',
		'id_mst_timesheet_summary',
		'value',
),
)); ?>
