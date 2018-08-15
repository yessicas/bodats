<?php
$this->breadcrumbs=array(
	'Sales Plans',
);

$this->menu=array(
array('label'=>'Create SalesPlan','url'=>array('create')),
array('label'=>'Manage SalesPlan','url'=>array('admin')),
);
?>

<h1>Sales Plans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
