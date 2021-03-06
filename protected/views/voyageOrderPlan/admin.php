<?php
$this->breadcrumbs=array(
	'Voyage Order Plans'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List VoyageOrderPlan','url'=>array('index')),
array('label'=>'Create VoyageOrderPlan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('voyage-order-plan-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Voyage Order Plans</h1>

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
'id'=>'voyage-order-plan-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_voyage_order_plan',
		'VoyageNumber',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		/*
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
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
