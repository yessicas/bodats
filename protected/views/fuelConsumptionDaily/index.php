<?php
$this->breadcrumbs=array(
	'Fuel Consumption Dailies',
);

$this->menu=array(
array('label'=>'Create Fuel Consumption Daily','url'=>array('create')),
array('label'=>'Manage Fuel Consumption Daily','url'=>array('admin')),
);
?>
<div id="content">
<h2>Fuel Consumption Dailies</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
