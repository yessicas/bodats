<?php
$this->breadcrumbs=array(
	'Demurage Costs'=>array('index'),
	$model->id_demurage_cost,
);

$this->menu=array(
//array('label'=>'List DemurageCost','url'=>array('index')),\
	array('label'=>'Manage Demurage Cost','url'=>array('admin')),
	array('label'=>'Voyage Closing','url'=>array('voyageorder/close_voyage')),
	//array('label'=>'Create Demurage Cost','url'=>array('create')),
	array('label'=>'View Demurage Cost','url'=>array('view','id'=>$model->id_demurage_cost),'active'=>true),
	array('label'=>'Update Demurage Cost','url'=>array('update','id'=>$model->id_demurage_cost)),
	//array('label'=>'Delete Demurage Cost','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_demurage_cost),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<div id="content">
<h2>View Demurage Cost #<?php echo $model->voyage->VoyageOrderNumber; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_demurage_cost',
	array('label'=>'Voyage Order',
				  'value'=>$model->voyage->VoyageOrderNumber),
		//'id_voyage_order',
	array(
            'name'=>'transaction_date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->transaction_date, "medium",""),
           ),
		//'transaction_date',
		'description',
		array(
            'name'=>'amount',
             'value'=>NumberAndCurrency::formatCurrency($model->amount),
            ),
		array(

		'label'=>'Is Invoice Created',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>DemurageCost::model()->status($model->is_invoice_created),  

		),
		//'is_invoice_created',
		//'invoice_number',
		//'id_invoice_voyage',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
