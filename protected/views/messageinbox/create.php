<?php
$this->breadcrumbs=array(
	'Message Inboxes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Message Inbox','url'=>array('index')),
array('label'=>'Manage Message Inbox','url'=>array('admin')),
);
?>

<h1>Create Message Inbox</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>