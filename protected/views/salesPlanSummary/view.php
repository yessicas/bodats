<?php
/* @var $this SalesPlanSummaryController */
/* @var $model SalesPlanSummary */

$this->breadcrumbs=array(
	'Sales Plan Summaries'=>array('index'),
	$model->id_sales_plan_summary,
);

$this->menu=array(
	array('label'=>'List SalesPlanSummary', 'url'=>array('index')),
	array('label'=>'Create SalesPlanSummary', 'url'=>array('create')),
	array('label'=>'Update SalesPlanSummary', 'url'=>array('update', 'id'=>$model->id_sales_plan_summary)),
	array('label'=>'Delete SalesPlanSummary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sales_plan_summary),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalesPlanSummary', 'url'=>array('admin')),
);
?>

<h1>View SalesPlanSummary #<?php echo $model->id_sales_plan_summary; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sales_plan_summary',
		'year',
		'month',
		'TotalVoyage',
		'TotalRevenue',
		'TotalCost',
		'GP_COGM',
		'GP_COGS',
		'created_date',
		'created_user',
		'ip_user_updated',
	),
)); ?>
