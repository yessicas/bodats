<?php
$this->breadcrumbs=array(
	'Schedule Plans',
);

$this->menu=array(
array('label'=>'Create SchedulePlan','url'=>array('create')),
array('label'=>'Manage SchedulePlan','url'=>array('admin')),
);
?>
<div id="content">
<h2>Schedule Plans</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
