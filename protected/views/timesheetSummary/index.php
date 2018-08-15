<?php
$this->breadcrumbs=array(
	'Timesheet Summaries',
);

$this->menu=array(
array('label'=>'Create TimesheetSummary','url'=>array('create')),
array('label'=>'Manage TimesheetSummary','url'=>array('admin')),
);
?>

<h1>Timesheet Summaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
