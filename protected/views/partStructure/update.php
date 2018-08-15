<?php
$this->breadcrumbs=array(
	'Part Structures'=>array('index'),
	$model->id_part_structure=>array('view','id'=>$model->id_part_structure),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List PartStructure','url'=>array('index')),
	array('label'=>'Manage Part Structure','url'=>array('admin')),
	array('label'=>'Create Part Structure','url'=>array('create')),
	array('label'=>'View Part Structure','url'=>array('view','id'=>$model->id_part_structure)),
	array('label'=>'Update Part Structure','url'=>array('update','id'=>$model->id_part_structure)),
	
	);
	?>

	<h3>Update Part Structure<font color=#BD362F> <?php echo $model->id_part_structure; ?></font></h3>

<?php echo $this->renderPartial('../PartStructure/_form',array('model'=>$model)); ?>