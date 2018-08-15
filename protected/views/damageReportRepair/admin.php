<?php
$this->breadcrumbs=array(
	'Damage Report Repairs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DamageReportRepair','url'=>array('index')),
array('label'=>'Create DamageReportRepair','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('damage-report-repair-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Damage Report Repairs</h1>

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
'id'=>'damage-report-repair-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_damage_report_repair',
		'id_damage_report',
		'id_request_for_schedule',
		'id_vessel',
		'StartRepair',
		'EndRepair',
		/*
		'DamageReportNumber',
		'NoReport',
		'NoMonth',
		'NoYear',
		'Description',
		'PIC',
		'Status',
		'CausedDamage',
		'RepairPhoto1',
		'RepairPhoto2',
		'RepairPhoto3',
		'Master',
		'ChiefEngineer',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
