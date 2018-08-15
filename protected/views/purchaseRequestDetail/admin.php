<?php
$this->breadcrumbs=array(
	'Purchase Request Details'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PurchaseRequestDetail','url'=>array('index')),
array('label'=>'Create PurchaseRequestDetail','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('purchase-request-detail-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Purchase Request Details</h1>

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
'id'=>'purchase-request-detail-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_purchase_request_detail',
		'id_purchase_request',
		'purchase_item_table',
		'id_item',
		'quantity',
		'id_metric_pr',
		/*
		'dedicated_to',
		'id_vessel',
		'id_voyage_order',
		'notes',
		'requested_user',
		'requested_date',
		'ip_user_requested',
		'status',
		'approved_user',
		'approval_date',
		'ip_user_approved',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
