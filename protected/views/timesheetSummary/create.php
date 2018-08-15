<?php
$this->breadcrumbs=array(
	'Timesheet Summaries'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TimesheetSummary','url'=>array('index')),
array('label'=>'Manage TimesheetSummary','url'=>array('admin')),
);
?>

<h1>Create TimesheetSummary</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>