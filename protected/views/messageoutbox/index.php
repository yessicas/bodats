<?php
$this->breadcrumbs=array(
	'Message Outboxes',
);

$this->menu=array(
array('label'=>'Create Message Outbox','url'=>array('create')),
array('label'=>'Manage Message Outbox','url'=>array('admin')),
);
?>

<h1>Message Outboxes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
