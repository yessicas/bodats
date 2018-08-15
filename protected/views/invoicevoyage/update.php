<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	$model->id_invoice_voyage=>array('view','id'=>$model->id_invoice_voyage),
	'Update',
);

	/*
	$this->menu=array(
	array('label'=>'Manage Invoice Voyage ','url'=>array('invoicevoyage/admin')),
	array('label'=>'Update Invoice Voyage','url'=>array('invoicevoyage/update','id'=>$model->id_voyage_order)),
	);
	*/

	InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"Update Invoice", 'invoicevoyage/update/id/'.$model->id_voyage_order);
?>

<div id="content">
<h2>Update Invoice</h2>
<hr>
</div>

<?php echo $this->renderPartial('_form_update', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); ?>