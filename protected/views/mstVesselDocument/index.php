<?php
$this->breadcrumbs=array(
	'Mst Vessel Documents',
);

$this->menu=array(
array('label'=>'Create Mst Vessel Document','url'=>array('create')),
array('label'=>'Manage Mst Vessel Document','url'=>array('admin')),
);
?>
<div id="content">
<h2> Vessel Documents</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
