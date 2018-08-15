<?php
$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	$model->id_schedule=>array('view','id'=>$model->id_schedule),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List Schedule','url'=>array('index')),
	array('label'=>'Manage Schedule','url'=>array('admin')),
	array('label'=>'Create Schedule','url'=>array('create')),
	//array('label'=>'View Schedule','url'=>array('view','id'=>$model->id_schedule)),
	array('label'=>'Update Schedule','url'=>array('update','id'=>$model->id_schedule),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Schedule<font color=#BD362F> <?php echo $model->id_schedule; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../Schedule/_form',array('model'=>$model)); ?>