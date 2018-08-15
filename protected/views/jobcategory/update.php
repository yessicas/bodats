<?php
$this->breadcrumbs=array(
	'Job Categories'=>array('index'),
	$model->id_job_category=>array('view','id'=>$model->id_job_category),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JobCategory','url'=>array('index')),
	array('label'=>'Create JobCategory','url'=>array('create')),
	array('label'=>'View JobCategory','url'=>array('view','id'=>$model->id_job_category)),
	array('label'=>'Manage JobCategory','url'=>array('admin')),
	);
	?>

<div class="well">
<h4>Update JobCategory <?php echo $model->id_job_category; ?></h4>
<hr>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>