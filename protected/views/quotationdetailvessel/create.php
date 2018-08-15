<?php
$this->breadcrumbs=array(
	'Quotation Detail Vessels'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List QuotationDetailVessel','url'=>array('index')),
//array('label'=>'Manage QuotationDetailVessel','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create Quotation Detail Vessel</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'quotationdata'=>$quotationdata)); ?>