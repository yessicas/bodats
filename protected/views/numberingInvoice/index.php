<?php
$this->breadcrumbs=array(
	'Numbering Invoices',
);

$this->menu=array(
array('label'=>'Create NumberingInvoice','url'=>array('create')),
array('label'=>'Manage NumberingInvoice','url'=>array('admin')),
);
?>

<h1>Numbering Invoices</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
