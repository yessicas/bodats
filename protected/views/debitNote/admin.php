<?php
$this->breadcrumbs=array(
	'Debit Notes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Debit Note','url'=>array('admin'),'active'=>true),
array('label'=>'Create Debit Note','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('debit-note-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Debit Notes</h2>
<hr>
</div>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'debit-note-grid',
'dataProvider'=>$model->search(),
'type' => 'striped bordered condensed',
'filter'=>$model,
'columns'=>array(
		//'id_debit_note',
		'id_voyage_order',
		 array(
            'name'=>'transaction_date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->transaction_date, "medium","")',
            ),
		//'transaction_date',
		'id_debit_note_category',
		'description',
		'omitted_status',
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
