<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	$model->id_good_receive,
);

$this->menu=array(
array('label'=>'List GoodReceive','url'=>array('index')),
array('label'=>'Create GoodReceive','url'=>array('create')),
array('label'=>'Update GoodReceive','url'=>array('update','id'=>$model->id_good_receive)),
array('label'=>'Delete GoodReceive','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_good_receive),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage GoodReceive','url'=>array('admin')),
);
?>

<div id="content">
<h2>View GoodReceive #<?php echo $model->receive_by; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_good_receive',
		//'id_purchase_order',
		//'id_purchase_order_detail',
		//'id_po_category',
		'received_date',
		'receive_by',
		'condition',
		'notes',
		//'amount',
		//'purchase_item_table',
		//'id_item',
		//'item_add_info',
		'quantity',
		'metric',
		'receive_number',
		'status_receive',
		//'created_user',
		//'created_date',
		//'ip_user_updated',
),
)); ?>
