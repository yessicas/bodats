<?php
$this->breadcrumbs=array(
	'Rent Items',
);

$this->menu=array(
array('label'=>'Create RentItem','url'=>array('create')),
array('label'=>'Manage RentItem','url'=>array('admin')),
);
?>
<div id="content">
<h2>Rent Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
