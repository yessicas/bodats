<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups',
);

$this->menu=array(
array('label'=>'Create VoyageMstActivityGroup','url'=>array('create')),
array('label'=>'Manage VoyageMstActivityGroup','url'=>array('admin')),
);
?>
<div id="content">
<h2>Voyage Mst Activity Groups</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
