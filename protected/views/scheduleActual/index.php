<?php
$this->breadcrumbs=array(
	'Schedule Actuals',
);

$this->menu=array(
array('label'=>'Create ScheduleActual','url'=>array('create')),
array('label'=>'Manage ScheduleActual','url'=>array('admin')),
);
?>
<div id="content">
<h2>Schedule Actuals</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
