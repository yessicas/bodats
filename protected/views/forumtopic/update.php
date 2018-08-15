<?php
$this->breadcrumbs=array(
	'Forum Topics'=>array('index'),
	$model->id_forum_topic=>array('view','id'=>$model->id_forum_topic),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ForumTopic','url'=>array('index')),
	array('label'=>'Create ForumTopic','url'=>array('create')),
	array('label'=>'View ForumTopic','url'=>array('view','id'=>$model->id_forum_topic)),
	array('label'=>'Manage ForumTopic','url'=>array('admin')),
	);
	?>
<div class="well">
<h4>Ubah  Topik  <?php echo $model->judul_topic; ?> </h4>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>