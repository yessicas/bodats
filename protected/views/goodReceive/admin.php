<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List GoodReceive','url'=>array('index')),
array('label'=>'Create GoodReceive','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('good-receive-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Good Receives</h1>

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
'id'=>'good-receive-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_good_receive',
		'id_purchase_order',
		'id_purchase_order_detail',
		'id_po_category',
		'received_date',
		'receive_by',
		/*
		'condition',
		'notes',
		'amount',
		'purchase_item_table',
		'id_item',
		'item_add_info',
		'quantity',
		'metric',
		'receive_number',
		'status_receive',
		'created_user',
		'created_date',
		'ip_user_updated',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
