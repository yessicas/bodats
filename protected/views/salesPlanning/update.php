<?php
$this->breadcrumbs=array(
	'Sales Plans'=>array('index'),
	$model->id_sales_plan=>array('view','id'=>$model->id_sales_plan),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SalesPlan','url'=>array('index')),
	array('label'=>'Create SalesPlan','url'=>array('create')),
	array('label'=>'View SalesPlan','url'=>array('view','id'=>$model->id_sales_plan)),
	array('label'=>'Manage SalesPlan','url'=>array('admin')),
	);
	?>

	<h1>Update SalesPlan <?php echo $model->id_sales_plan; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>