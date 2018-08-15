<?php
$this->breadcrumbs=array(
	'Demurage Costs'=>array('index'),
	$model->id_demurage_cost=>array('view','id'=>$model->id_demurage_cost),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List DemurageCost','url'=>array('index')),
	array('label'=>'Manage Demurage Cost','url'=>array('admin')),
	array('label'=>'Voyage Closing','url'=>array('voyageorder/close_voyage')),
	//array('label'=>'Create Demurage Cost','url'=>array('create')),
	array('label'=>'View Demurage Cost','url'=>array('view','id'=>$model->id_demurage_cost)),
	array('label'=>'Update Demurage Cost','url'=>array('update','id'=>$model->id_demurage_cost),'active'=>true),
	
	);
	?>

	<div id="content">
	<h2>Update Demurage Cost <?php echo $model->voyage->VoyageOrderNumber; ?></h2>
	<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>