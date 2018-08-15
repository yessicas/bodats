<?php
$this->breadcrumbs=array(
	'Sales Costs'=>array('index'),
	$model->id_sales_cost,
);

$this->menu=array(
array('label'=>'List Calculator History','url'=>array('index')),
array('label'=>'Create Calculator History','url'=>array('create')),
array('label'=>'Update Calculator History','url'=>array('update','id'=>$model->id_sales_cost)),
array('label'=>'Delete Calculator History','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sales_cost),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Calculator History','url'=>array('admin')),
);
?>

<h1>View Calculator History #<?php echo $model->id_sales_cost; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_sales_cost',
		'JettyIdStart',
		'JettyIdEnd',
		'BargeSize',
		'Capacity',
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
		'TotalRevenue',
		'TotalSalesCost',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
