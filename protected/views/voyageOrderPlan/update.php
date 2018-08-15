<?php
$this->breadcrumbs=array(
	'Voyage Order Plans'=>array('index'),
	$model->id_voyage_order_plan=>array('view','id'=>$model->id_voyage_order_plan),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VoyageOrderPlan','url'=>array('index')),
	array('label'=>'Create VoyageOrderPlan','url'=>array('create')),
	array('label'=>'View VoyageOrderPlan','url'=>array('view','id'=>$model->id_voyage_order_plan)),
	array('label'=>'Manage VoyageOrderPlan','url'=>array('admin')),
	);
	?>

	<h1>Update VoyageOrderPlan <?php echo $model->id_voyage_order_plan; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>