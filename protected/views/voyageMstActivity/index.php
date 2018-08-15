<?php
$this->breadcrumbs=array(
	'Voyage Mst Activities',
);

$this->menu=array(
array('label'=>'Create Voyage Mst Activity','url'=>array('create')),
array('label'=>'Manage Voyage Mst Activity','url'=>array('admin')),
);
?>
<div id="content">
<h2>Voyage Mst Activities</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
