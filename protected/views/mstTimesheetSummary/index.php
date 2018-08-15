<?php
$this->breadcrumbs=array(
	'Mst Timesheet Summaries',
);

$this->menu=array(
array('label'=>'Create MstTimesheetSummary','url'=>array('create')),
array('label'=>'Manage MstTimesheetSummary','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Timesheet Summaries</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
