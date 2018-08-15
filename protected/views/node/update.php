<?php
$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	$model->id_node=>array('view','id'=>$model->id_node),
	'Update',
);

	$this->menu=array(
	array('label'=>'Update Node','url'=>array('entity/entinodeupdate','id'=>$model->id_node)),
	array('label'=>'Create Node','url'=>array('entity/entinodecreate')),
	array('label'=>'View Node','url'=>array('entity/entinodeview','id'=>$model->id_node)),
	array('label'=>'Manage Node','url'=>array('entity/entinode')),
	);
	?>
<div id="content">
	<h2>Update Node # <font color="#BD362F"> <?php echo $model->node_name; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../node/_form',array('model'=>$model)); ?>