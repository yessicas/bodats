<?php
$this->breadcrumbs=array(
	'Service Items'=>array('index'),
	$model->id_service_item=>array('view','id'=>$model->id_service_item),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Service Item','url'=>array('admin')),
	array('label'=>'Create Service Item','url'=>array('create')),
	array('label'=>'View Service Item','url'=>array('view','id'=>$model->id_service_item)),
	array('label'=>'Update Service Item','url'=>array('update','id'=>$model->id_service_item),'active'=>true),
	);
	?>

<div id="content">
<h2>Update Survey Item</h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>