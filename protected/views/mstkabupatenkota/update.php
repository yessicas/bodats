<?php
$this->breadcrumbs=array(
	'Mst Kabupatenkotas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MstKabupatenkota','url'=>array('index')),
	array('label'=>'Create MstKabupatenkota','url'=>array('create')),
	array('label'=>'View MstKabupatenkota','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage MstKabupatenkota','url'=>array('admin')),
	);
	?>

	<h1>Update MstKabupatenkota <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>