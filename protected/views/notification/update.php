<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id_notification=>array('view','id'=>$model->id_notification),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Notification','url'=>array('index')),
	array('label'=>'Create Notification','url'=>array('create')),
	array('label'=>'View Notification','url'=>array('view','id'=>$model->id_notification)),
	array('label'=>'Manage Notification','url'=>array('admin')),
	);
	?>

<div class="well">
<h4>Update Notification <?php echo $model->id_notification; ?></h4>
<hr>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>