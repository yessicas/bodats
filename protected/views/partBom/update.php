<?php
$this->breadcrumbs=array(
	'Part Boms'=>array('index'),
	$model->id_part_bom=>array('view','id'=>$model->id_part_bom),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List PartBom','url'=>array('index')),
	array('label'=>'Manage Part Bom','url'=>array('admin')),
	array('label'=>'Create Part Bom','url'=>array('create')),
	array('label'=>'View Part Bom','url'=>array('view','id'=>$model->id_part_bom)),
	array('label'=>'Update Part Bom','url'=>array('update','id'=>$model->id_part_bom),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Part Bom<font color=#BD362F> <?php echo $model->id_part_bom; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../PartBom/_form',array('model'=>$model)); ?>