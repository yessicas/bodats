<?php
$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	$model->id_part_level=>array('view','id'=>$model->id_part_level),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List PartLevel','url'=>array('index')),
	array('label'=>'Manage Part Level','url'=>array('admin')),
	array('label'=>'Create Part Level','url'=>array('create')),
	array('label'=>'View Part Level','url'=>array('view','id'=>$model->id_part_level)),
	array('label'=>'Update Part Level','url'=>array('update','id'=>$model->id_part_level)),
	
	);
	?>

	<h3>Update Part Level<font color=#BD362F> <?php echo $model->part_level_name; ?></font></h2>
	

<?php echo $this->renderPartial('../PartLevel/_form',array('model'=>$model)); ?>