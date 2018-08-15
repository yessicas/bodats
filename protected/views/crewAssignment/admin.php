<?php
$this->breadcrumbs=array(
	'Crew Assignments'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Crew Assignment','url'=>array('index')),
array('label'=>'Create Crew Assignment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('crew-assignment-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Crew Assignments</h1>

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
'id'=>'crew-assignment-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_crew_assignment',
		'vessel_id',
		'CrewId',
		'id_crew_position',
		'start_date',
		'expired_date',
		/*
		'status_active',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
