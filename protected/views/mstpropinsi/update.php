<?php
$this->breadcrumbs=array(
	'Mst Propinsis'=>array('index'),
	$model->id_propinsi=>array('view','id'=>$model->id_propinsi),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MstPropinsi','url'=>array('index')),
	array('label'=>'Create MstPropinsi','url'=>array('create')),
	array('label'=>'View MstPropinsi','url'=>array('view','id'=>$model->id_propinsi)),
	array('label'=>'Manage MstPropinsi','url'=>array('admin')),
	);
	?>

	<h1>Update MstPropinsi <?php echo $model->id_propinsi; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>