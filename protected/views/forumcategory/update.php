<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	$model->id_forum_category=>array('view','id'=>$model->id_forum_category),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ForumCategory','url'=>array('index')),
	array('label'=>'Create ForumCategory','url'=>array('create')),
	array('label'=>'View ForumCategory','url'=>array('view','id'=>$model->id_forum_category)),
	array('label'=>'Manage ForumCategory','url'=>array('admin')),
	);
	?>

<div class="well">
<h4>Ubah  Category <?php echo $model->forum_category; ?> </h4>
</div>


<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>