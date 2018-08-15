<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	$model->id_warehouse=>array('view','id'=>$model->id_warehouse),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List Warehouse','url'=>array('index')),
	array('label'=>'Manage Warehouse','url'=>array('admin')),
	array('label'=>'Create Warehouse','url'=>array('create')),
	array('label'=>'View Warehouse','url'=>array('view','id'=>$model->id_warehouse)),
	array('label'=>'Update Warehouse','url'=>array('update','id'=>$model->id_warehouse),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Warehouse<font color=#BD362F> <?php echo $model->warehouse_name; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../Warehouse/_form',array('model'=>$model)); ?>