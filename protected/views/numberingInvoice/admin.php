<?php
	$this->breadcrumbs=array(
		'Numbering Invoices'=>array('index'),
		'Manage',
	);

	$this->menu=array(
	array('label'=>'List Numbering Invoice','url'=>array('admin'), 'active'=>true),
	array('label'=>'Create Numbering Invoice','url'=>array('create')),
	);

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
	});
	$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-invoice-grid', {
	data: $(this).serialize()
	});
	return false;
	});
	");
?>

<div id="content">
<h2>Manage Numbering Invoice</h2>
</div>


<?php
	$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'numbering-invoice-grid',
	'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
			array(
				'header'=>'No',    
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
			//'id_numbering',
			'number_invoice',
			'number_invoice_complete',
			'status',
			'notes',
			'taken_date',
			'user_taken',
			//'is_initial',
			//'id_invoice_voyage',
			/*
			'taken_date',
			'user_taken',
			'ip_user_taken',
			*/
	array(
	'class'=>'bootstrap.widgets.TbButtonColumn',
	),
	),
	)); 
?>
