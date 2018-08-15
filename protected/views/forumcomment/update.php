<?php
$this->breadcrumbs=array(
	'Forum Comments'=>array('index'),
	$model->id_forum_comment=>array('view','id'=>$model->id_forum_comment),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ForumComment','url'=>array('index')),
	array('label'=>'Create ForumComment','url'=>array('create')),
	array('label'=>'View ForumComment','url'=>array('view','id'=>$model->id_forum_comment)),
	array('label'=>'Manage ForumComment','url'=>array('admin')),
	);
	?>

	<h1>Update ForumComment <?php echo $model->id_forum_comment; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>