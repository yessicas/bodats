<?php
$this->breadcrumbs=array(
	'Sales Plans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SalesPlan','url'=>array('index')),
array('label'=>'Manage SalesPlan','url'=>array('admin')),
);
?>

<h1>Create SalesPlan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>