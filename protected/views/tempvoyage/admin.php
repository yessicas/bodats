<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */

$this->breadcrumbs=array(
	'Temp Voyages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TempVoyage', 'url'=>array('index')),
	array('label'=>'Create TempVoyage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#temp-voyage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Temp Voyages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temp-voyage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_temp_voyage',
		'id_voyage_order',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
