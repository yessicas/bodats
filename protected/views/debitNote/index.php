<?php
$this->breadcrumbs=array(
	'Debit Notes',
);

$this->menu=array(
array('label'=>'Create DebitNote','url'=>array('create')),
array('label'=>'Manage DebitNote','url'=>array('admin')),
);
?>

<h1>Debit Notes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
