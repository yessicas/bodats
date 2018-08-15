<?php
$this->breadcrumbs=array(
	'Demurage Costs',
);

$this->menu=array(
array('label'=>'Create DemurageCost','url'=>array('create')),
array('label'=>'Manage DemurageCost','url'=>array('admin')),
);
?>

<h1>Demurage Costs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
