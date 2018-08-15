<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */

$this->breadcrumbs=array(
	'Temp Voyages'=>array('index'),
	$model->id_temp_voyage,
);

$this->menu=array(
	array('label'=>'List TempVoyage', 'url'=>array('index')),
	array('label'=>'Create TempVoyage', 'url'=>array('create')),
	array('label'=>'Update TempVoyage', 'url'=>array('update', 'id'=>$model->id_temp_voyage)),
	array('label'=>'Delete TempVoyage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_temp_voyage),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TempVoyage', 'url'=>array('admin')),
);
?>

<h1>View TempVoyage #<?php echo $model->id_temp_voyage; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_temp_voyage',
		'id_voyage_order',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		'VOYear',
		'id_quotation',
		'id_so',
		'id_voyage_order_plan',
		'status',
		'invoice_created',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'id_settype_tugbarge',
		'BargeSize',
		'Capacity',
		'ActualCapacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
		'status_schedule',
		'cc_std_duration',
		'cc_std_fuel',
		'cc_act_duration',
		'cc_act_fuel_start',
		'cc_act_fuel',
		'cc_std_cost',
		'cc_std_margin',
		'cc_act_cost',
		'cc_act_margin',
		'approved_date',
		'approved_user',
		'ip_user_approved',
		'id_user_createmultiple',
	),
)); ?>
