<?php
$this->breadcrumbs=array(
	'Message Outboxes'=>array('index'),
	$model->title=>array('view','id'=>$model->id_outbox),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Message Outbox','url'=>array('index')),
	array('label'=>'Create Message Outbox','url'=>array('create')),
	array('label'=>'View Message Outbox','url'=>array('view','id'=>$model->id_outbox)),
	array('label'=>'Manage Message Outbox','url'=>array('admin')),
	);
	?>

	<h1>Update Message Outbox <?php echo $model->id_outbox; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>