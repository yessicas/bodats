<?php
$this->breadcrumbs=array(
	'Purchase Request Details'=>array('index'),
	$model->id_purchase_request_detail=>array('view','id'=>$model->id_purchase_request_detail),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PurchaseRequestDetail','url'=>array('index')),
	array('label'=>'Create PurchaseRequestDetail','url'=>array('create')),
	array('label'=>'View PurchaseRequestDetail','url'=>array('view','id'=>$model->id_purchase_request_detail)),
	array('label'=>'Manage PurchaseRequestDetail','url'=>array('admin')),
	);
	?>

	<h1>Update PurchaseRequestDetail <?php echo $model->id_purchase_request_detail; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>