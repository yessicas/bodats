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

InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"Create Invoice", 'invoicevoyage/create/id/'.$model->id_voyage_order);
?>
<div id="content">
<h2>Create Invoice</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); ?>