<?php
$this->breadcrumbs=array(
	'Demurage Costs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Voyage Closing','url'=>array('voyageorder/close_voyage')),
array('label'=>'Manage Demurage Cost','url'=>array('admin'),'active'=>true),
	
//array('label'=>'Create Demurage Cost','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('demurage-cost-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<div id="content">
<h2>Manage Demurage Costs</h2>
</div>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'demurage-cost-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_demurage_cost',
	 array(   
                'header'=>'Voyage Order',
                'name'=>'id_voyage_order',
                'value'=>'$data->voyage->VoyageOrderNumber',
                ),
		//'id_voyage_order',
	 array(
            'name'=>'transaction_date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->transaction_date, "medium","")',
            ),

		//'transaction_date',
		'description',
		'amount',
		array(
                'header'=>'Is Invoice Created',
                'name'=>'is_invoice_created',
               'value'=>'DemurageCost::model()->status($data->is_invoice_created)',
            ), 
		//'is_invoice_created',
		/*
		'invoice_number',
		'id_invoice_voyage',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
