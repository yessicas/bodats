<?php
$this->breadcrumbs=array(
	'Mst Metrics',
);

$this->menu=array(
array('label'=>'Create Mst Metric','url'=>array('create')),
array('label'=>'Manage Mst Metric','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Metrics</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
