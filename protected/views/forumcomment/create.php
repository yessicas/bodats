<?php
$this->breadcrumbs=array(
	'Forum Comments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ForumComment','url'=>array('index')),
array('label'=>'Manage ForumComment','url'=>array('admin')),
);
?>

<h1>Create ForumComment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>