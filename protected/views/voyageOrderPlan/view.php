<?php
$this->breadcrumbs=array(
	'Voyage Order Plans'=>array('index'),
	$model->id_voyage_order_plan,
);

$this->menu=array(
array('label'=>'List VoyageOrderPlan','url'=>array('index')),
array('label'=>'Create VoyageOrderPlan','url'=>array('create')),
array('label'=>'Update VoyageOrderPlan','url'=>array('update','id'=>$model->id_voyage_order_plan)),
array('label'=>'Delete VoyageOrderPlan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_order_plan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VoyageOrderPlan','url'=>array('admin')),
);
?>

<h1>View VoyageOrderPlan #<?php echo $model->id_voyage_order_plan; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_order_plan',
		'VoyageNumber',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		'Capacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
		'StartDate',
		'EndDate',
		'Price',
		'id_currency',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
