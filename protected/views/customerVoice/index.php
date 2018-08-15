<?php
$this->breadcrumbs=array(
	'Customer Voices',
);

$this->menu=array(
array('label'=>'Create Customer Voice','url'=>array('create')),
array('label'=>'Manage Customer Voice','url'=>array('admin')),
);
?>
<div id="content">
<h2>Customer Voices</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
