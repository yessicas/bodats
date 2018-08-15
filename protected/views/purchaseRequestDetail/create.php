<?php
$this->breadcrumbs=array(
	'Purchase Request Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PurchaseRequestDetail','url'=>array('index')),
array('label'=>'Manage PurchaseRequestDetail','url'=>array('admin')),
);
?>

<h1>Create PurchaseRequestDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>