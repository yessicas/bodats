<?php
$this->breadcrumbs=array(
	'Timesheets',
);

$this->menu=array(
array('label'=>'Create Timesheet','url'=>array('create')),
array('label'=>'Manage Timesheet','url'=>array('admin')),
);
?>
<div id="content">
<h2>Timesheets</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
