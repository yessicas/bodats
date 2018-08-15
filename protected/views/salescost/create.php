<?php
$this->breadcrumbs=array(
	'Sales Costs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Calculator History','url'=>array('index')),
array('label'=>'Manage Calculator History','url'=>array('admin')),
);
?>

<h1>Create Calculator History</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>