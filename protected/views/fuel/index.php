<?php
$this->breadcrumbs=array(
	'Fuels',
);

$this->menu=array(
array('label'=>'Create Fuel','url'=>array('create')),
array('label'=>'Manage Fuel','url'=>array('admin')),
);
?>
<div id="content">
<h2>Fuels</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
