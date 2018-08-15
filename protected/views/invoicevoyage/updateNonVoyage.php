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

	//InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"Update Invoice", 'invoicevoyage/update/id/'.$model->id_voyage_order);
$this->menu=array(
	array('label'=>'Manage Non Voyage Invoice ', 'url'=>array('voyageorder/invoiceNotVoyage')),  
	array('label'=>'Update Non Voyage Invoice','url'=>array('invoicevoyage/updateInvoicenonVoyage','id'=>$model->id_quotation)),
	array('label'=>'View Non Voyage Invoice','url'=>array('invoicevoyage/viewNonVoyage','id'=>$model->id_quotation)),
	);
?>

<div id="content">
<h2>Update Invoice Non Voyage</h2>
<hr>
</div>

<?php echo $this->renderPartial('_form_update_Non_Voyage', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); // model quotation ini sebenarnya cuman namanya aja ga di ubah ?>