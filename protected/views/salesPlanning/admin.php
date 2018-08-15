<?php
$this->breadcrumbs=array(
	'Sales Plans'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List SalesPlan','url'=>array('index')),
array('label'=>'Create SalesPlan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sales-plan-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Sales Plans</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'sales-plan-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_sales_plan',
		'id_vessel_tug',
		'id_vessel_barge',
		'year',
		'month',
		'VoyageName',
		/*
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
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>