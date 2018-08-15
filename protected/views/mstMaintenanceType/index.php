<?php
$this->breadcrumbs=array(
	'Mst Maintenance Types',
);

$this->menu=array(
array('label'=>'Create MstMaintenanceType','url'=>array('create')),
array('label'=>'Manage MstMaintenanceType','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Maintenance Types</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
