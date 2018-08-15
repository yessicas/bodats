<?php
$this->breadcrumbs=array(
	'Request For Schedules',
);

$this->menu=array(
array('label'=>'Create RequestForSchedule','url'=>array('create')),
array('label'=>'Manage RequestForSchedule','url'=>array('admin')),
);
?>
<div id="content">
<h2>Request For Schedules</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
