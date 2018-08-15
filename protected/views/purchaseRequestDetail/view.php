<?php
$this->breadcrumbs=array(
	'Purchase Request Details'=>array('index'),
	$model->id_purchase_request_detail,
);

$this->menu=array(
array('label'=>'List PurchaseRequestDetail','url'=>array('index')),
array('label'=>'Create PurchaseRequestDetail','url'=>array('create')),
array('label'=>'Update PurchaseRequestDetail','url'=>array('update','id'=>$model->id_purchase_request_detail)),
array('label'=>'Delete PurchaseRequestDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_purchase_request_detail),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PurchaseRequestDetail','url'=>array('admin')),
);
?>

<h1>View PurchaseRequestDetail #<?php echo $model->id_purchase_request_detail; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_purchase_request_detail',
		'id_purchase_request',
		'purchase_item_table',
		'id_item',
		'quantity',
		'id_metric_pr',
		'dedicated_to',
		'id_vessel',
		'id_voyage_order',
		'notes',
		'requested_user',
		'requested_date',
		'ip_user_requested',
		'status',
		'approved_user',
		'approval_date',
		'ip_user_approved',
),
)); ?>
