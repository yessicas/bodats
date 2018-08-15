<?php
$this->breadcrumbs=array(
	'Boms'=>array('index'),
	$model->id_bom=>array('view','id'=>$model->id_bom),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List Bom','url'=>array('index')),
	array('label'=>'Manage Bom','url'=>array('admin')),
	array('label'=>'Create Bom','url'=>array('create')),
	array('label'=>'View Bom','url'=>array('view','id'=>$model->id_bom)),
	array('label'=>'Update Bom','url'=>array('update','id'=>$model->id_bom),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Bom<font color=#BD362F> <?php echo $model->id_bom; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../Bom/_form',array('model'=>$model)); ?>