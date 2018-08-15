<?php
$this->breadcrumbs=array(
	'Crew Payroll Monthlies'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CrewPayrollMonthly','url'=>array('index')),
array('label'=>'Create CrewPayrollMonthly','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('crew-payroll-monthly-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Crew Payroll Monthlies</h1>

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
'id'=>'crew-payroll-monthly-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_crew_payroll_monthly',
		'month',
		'year',
		'CrewId',
		'id_payroll_item',
		'amount',
		/*
		'transfer_date',
		'transfer_type',
		'id_currency',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
