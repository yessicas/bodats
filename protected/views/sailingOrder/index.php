<?php
$this->breadcrumbs=array(
	'Sailing Orders',
);

$this->menu=array(
array('label'=>'Create Sailing Order','url'=>array('create')),
array('label'=>'Manage Sailing Order','url'=>array('admin')),
);
?>
<div id="content">
<h2>Sailing Orders</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
