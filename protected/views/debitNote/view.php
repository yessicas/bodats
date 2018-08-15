<?php
$this->breadcrumbs=array(
	'Debit Notes'=>array('index'),
	$model->id_debit_note,
);

$this->menu=array(
//array('label'=>'List DebitNote','url'=>array('index')),
array('label'=>'Manage Debit Note','url'=>array('admin')),
array('label'=>'Create Debit Note','url'=>array('create')),
array('label'=>'View Debit Note','url'=>array('view','id'=>$model->id_debit_note),'active'=>true),
array('label'=>'Update Debit Note','url'=>array('update','id'=>$model->id_debit_note)),
array('label'=>'Delete Debit Note','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_debit_note),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>View Debit Note #<?php echo $model->id_debit_note; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_debit_note',
		'id_voyage_order',
		array(
            'name'=>'transaction_date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->transaction_date, "medium",""),
           ),
		//'transaction_date',
		'id_debit_note_category',
		'description',
		'omitted_status',
		/*'created_date',
		'created_user',
		'ip_user_updated', */
),
)); ?>
