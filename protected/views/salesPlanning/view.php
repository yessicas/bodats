<?php
$this->breadcrumbs=array(
	'Sales Plans'=>array('index'),
	$model->id_sales_plan,
);

$this->menu=array(
array('label'=>'List SalesPlan','url'=>array('index')),
array('label'=>'Create SalesPlan','url'=>array('create')),
array('label'=>'Update SalesPlan','url'=>array('update','id'=>$model->id_sales_plan)),
array('label'=>'Delete SalesPlan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sales_plan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SalesPlan','url'=>array('admin')),
);
?>

<h1>View SalesPlan #<?php echo $model->id_sales_plan; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_sales_plan',
		'id_vessel_tug',
		'id_vessel_barge',
		'year',
		'month',
		'VoyageName',
		'id_customer',
		'voyage_no',
		'JettyIdStart',
		'JettyIdEnd',
		'TotalQuantity',
		'QuantityUnit',
		'PriceUnit',
		'id_currency',
		'change_rate',
		'FuelLtr',
		'FuelCost',
		'AgencyCost',
		'DepreciationCost',
		'CrewCost',
		'Rent',
		'SubconCost',
		'IncuranceCost',
		'RepairCost',
		'DockingCost',
		'BrokerageCost',
		'OthersCost',
		'GP_COGM',
		'MarginFuelCost',
		'MarginAgencyCost',
		'MarginDepreciationCost',
		'MarginCrewCost',
		'MarginRent',
		'MarginSubconCost',
		'MarginIncuranceCost',
		'MarginRepairCost',
		'MarginDockingCost',
		'MarginBrokerageCost',
		'MarginOthersCost',
		'GP_COGS',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
