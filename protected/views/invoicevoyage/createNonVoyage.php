<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	'Create',
);

/*
$this->menu=array(
//array('label'=>'List InvoiceVoyage','url'=>array('index')),
//array('label'=>'Manage InvoiceVoyage','url'=>array('admin')),
array('label'=>'Manage Invoice Voyage ','url'=>array('invoicevoyage/admin')),
array('label'=>'Create Invoice Voyage','url'=>array('invoicevoyage/create','id'=>$_GET['id'])),
);
*/

//InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"Create Invoice", 'invoicevoyage/create/id/'.$model->id_voyage_order);
$this->menu=array(
	array('label'=>'Manage Non Voyage Invoice ', 'url'=>array('voyageorder/invoiceNotVoyage')),  
	array('label'=>'Create Non Voyage Invoice','url'=>array('invoicevoyage/createinvoicenonVoyage','id'=>$modelvoyage->id_quotation)),
	//array('label'=>'Update Non Voyage Invoice','url'=>array('invoicevoyage/updateInvoicenonVoyage','id'=>$model->id_quotation)),
	//array('label'=>'View Non Voyage Invoice','url'=>array('invoicevoyage/viewNonVoyage','id'=>$model->id_quotation)),
	);
?>
<div id="content">
<h2>Create Invoice Non Voyage </h2>
<hr>
</div>


<?php echo $this->renderPartial('_form_Non_Voyage', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); // model quotation ini sebenarnya cuman namanya aja ga di ubah ?>