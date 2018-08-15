<?php
$this->breadcrumbs=array(
	'Schedules',
);

$this->menu=array(
array('label'=>'Create Schedule','url'=>array('create')),
array('label'=>'Manage Schedule','url'=>array('admin')),
);
?>
<div id="content">
<h2>Schedules</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
