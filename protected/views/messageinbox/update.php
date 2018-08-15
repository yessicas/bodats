<?php
$this->breadcrumbs=array(
	'Message Inboxes'=>array('index'),
	$model->title=>array('view','id'=>$model->id_inbox),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Message Inbox','url'=>array('index')),
	array('label'=>'Create Message Inbox','url'=>array('create')),
	array('label'=>'View Message Inbox','url'=>array('view','id'=>$model->id_inbox)),
	array('label'=>'Manage Message Inbox','url'=>array('admin')),
	);
	?>

	<h1>Update Message Inbox <?php echo $model->id_inbox; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>