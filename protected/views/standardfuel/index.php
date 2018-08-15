<?php
$this->breadcrumbs=array(
	'Standard Fuels',
);

$this->menu=array(
array('label'=>'Create StandardFuel','url'=>array('create')),
array('label'=>'Manage StandardFuel','url'=>array('admin')),
);
?>
<div id="content">
<h2>Standard Fuels</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
