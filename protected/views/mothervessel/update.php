<?php
$this->breadcrumbs=array(
	'Mothervessels'=>array('index'),
	$model->id_mothervessel=>array('view','id'=>$model->id_mothervessel),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Mother Vessel','url'=>array('entity/entimother')),
	array('label'=>'Create Mother Vessel','url'=>array('entity/entimothercreate')),
	array('label'=>'View Mother Vessel','url'=>array('entity/entimotherview','id'=>$model->id_mothervessel)),
	array('label'=>'Update Mother Vessel','url'=>array('entity/entimotherupdate','id'=>$model->id_mothervessel)),
	);
	?>

	<div id="content">
	<h2>Update Mother Vessel <font color="#BD362F"> # <?php echo $model->MV_Name; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../mothervessel/_form',array('model'=>$model)); ?>