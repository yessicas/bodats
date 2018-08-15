<?php
$this->breadcrumbs=array(
	'Sales Costs',
);

$this->menu=array(
array('label'=>'Create Calculator History','url'=>array('create')),
array('label'=>'Manage Calculator History','url'=>array('admin')),
);
?>

<h1>Calculator History</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
