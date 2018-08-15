<?php
$this->breadcrumbs=array(
	'Purchase Request Picas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PurchaseRequestPica','url'=>array('index')),
array('label'=>'Create PurchaseRequestPica','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('purchase-request-pica-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<div id="content">
<h2>Manage Purchase Request Pica</h2>
<hr>
</div>




<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-request-pica-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_purchase_request_pica',
		'id_purchase_request',
		'problem',
		'corrective_action',
		'PIC',
		'status_corrective',
		/*
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
