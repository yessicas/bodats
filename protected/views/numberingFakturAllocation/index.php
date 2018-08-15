<?php
$this->breadcrumbs=array(
	'Numbering Faktur Allocations',
);

$this->menu=array(
array('label'=>'Create NumberingFakturAllocation','url'=>array('create')),
array('label'=>'Manage NumberingFakturAllocation','url'=>array('admin')),
);
?>

<h1>Numbering Faktur Allocations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
