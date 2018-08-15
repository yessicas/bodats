<?php
$this->breadcrumbs=array(
	'Sales Costs'=>array('index'),
	$model->id_sales_cost=>array('view','id'=>$model->id_sales_cost),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Calculator History','url'=>array('index')),
	array('label'=>'Create Calculator History','url'=>array('create')),
	array('label'=>'View Calculator History','url'=>array('view','id'=>$model->id_sales_cost)),
	array('label'=>'Manage Calculator History','url'=>array('admin')),
	);
	?>

	<h1>Update Calculator History <?php echo $model->id_sales_cost; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>