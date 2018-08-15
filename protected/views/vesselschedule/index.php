<?php
$this->breadcrumbs=array(
	'Vessel Schedules',
);

$this->menu=array(
array('label'=>'Create VesselSchedule','url'=>array('create')),
array('label'=>'Manage VesselSchedule','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vessel Schedules</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
