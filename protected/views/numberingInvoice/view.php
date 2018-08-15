<?php
$this->breadcrumbs=array(
	'Numbering Invoices'=>array('index'),
	$model->id_numbering,
);

$this->menu=array(
	array('label'=>'List Numbering Invoice','url'=>array('admin')),
	array('label'=>'Create Numbering Invoice','url'=>array('create')),
	array('label'=>'View Numbering Invoice','url'=>array('view'), 'active'=>true),
);
?>

<div id="content">
<h2>View NumberingInvoice #<?php echo $model->id_numbering; ?></h2>
</div>

<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_numbering',
		'number_invoice',
		'status',
		'notes',
		'is_initial',
		//'id_invoice_voyage',
		'taken_date',
		'user_taken',
		'ip_user_taken',
),
)); ?>
</div>