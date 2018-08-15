<?php
$this->breadcrumbs=array(
	'Storage Locations'=>array('index'),
	$model->StorageLocationId=>array('view','id'=>$model->StorageLocationId),
	'Update',
);

	$this->menu=array(
	array('label'=>'Update Storage Location','url'=>array('entity/entistorupdate','id'=>$model->StorageLocationId)),
	array('label'=>'Create Storage Location','url'=>array('entity/entistorcreate')),
	array('label'=>'View Storage Location','url'=>array('entity/entistorview','id'=>$model->StorageLocationId)),
	array('label'=>'Manage Storage Location','url'=>array('entity/entistorage')),
	);
	?>
<div id="content">
<h2>Update StorageLocation <?php echo $model->StorageLocationId; ?></h2>
<hr>
</div>
	
	

<?php echo $this->renderPartial('../storageLocation/_form',array('model'=>$model)); ?>