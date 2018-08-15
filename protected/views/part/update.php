<?php
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->id_part=>array('view','id'=>$model->id_part),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List Part','url'=>array('index')),
	array('label'=>'Manage Part','url'=>array('admin')),
	array('label'=>'Create Part','url'=>array('create')),
	//array('label'=>'View Part','url'=>array('view','id'=>$model->id_part)),
	array('label'=>'Update Part','url'=>array('update','id'=>$model->id_part),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Part<font color=#BD362F> # <?php echo $model->PartName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../Part/_form',array('model'=>$model)); ?>