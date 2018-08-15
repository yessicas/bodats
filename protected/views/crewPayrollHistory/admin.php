<?php
$this->breadcrumbs=array(
	'Crew Payroll Histories'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CrewPayrollHistory','url'=>array('index')),
array('label'=>'Create CrewPayrollHistory','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('crew-payroll-history-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Crew Payroll Histories</h1>

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
'id'=>'crew-payroll-history-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_crew_payroll_history',
		'CrewId',
		'id_payroll_item',
		'amount',
		'effective_date',
		'legal_document',
		/*
		'notes',
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
