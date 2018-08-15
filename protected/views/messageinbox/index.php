<?php
$this->breadcrumbs=array(
	'Message Inboxes',
);

$this->menu=array(
array('label'=>'Create Message Inbox','url'=>array('create')),
array('label'=>'Manage Message Inbox','url'=>array('admin')),
);
?>

<h1>Message Inboxes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
