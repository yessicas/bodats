<?php
$this->breadcrumbs=array(
	'Friendships'=>array('index'),
	$model->id_friendship=>array('view','id'=>$model->id_friendship),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Friendship','url'=>array('index')),
	array('label'=>'Create Friendship','url'=>array('create')),
	array('label'=>'View Friendship','url'=>array('view','id'=>$model->id_friendship)),
	array('label'=>'Manage Friendship','url'=>array('admin')),
	);
	?>

<div class="well">
<h4>Update Friendship <?php echo $model->id_friendship; ?></h4>
<hr>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>