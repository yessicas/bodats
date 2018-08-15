<?php
/* @var $this SalesPlanSummaryController */
/* @var $model SalesPlanSummary */

$this->breadcrumbs=array(
	'Sales Plan Summaries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SalesPlanSummary', 'url'=>array('index')),
	array('label'=>'Create SalesPlanSummary', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sales-plan-summary-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sales Plan Summaries</h1>

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
	'id'=>'sales-plan-summary-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_sales_plan_summary',
		'year',
		'month',
		'TotalVoyage',
		'TotalRevenue',
		'TotalCost',
		/*
		'GP_COGM',
		'GP_COGS',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
