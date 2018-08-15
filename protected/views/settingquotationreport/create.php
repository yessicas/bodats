<?php
$this->breadcrumbs=array(
	'Setting Quotation Reports'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Setting Quotation Report','url'=>array('setting/quot')),
array('label'=>'Create Setting Quotation Report','url'=>array('setting/quotcreate')),

);
?>
<div id="content">
<h2>Create Setting Quotation Report</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SettingQuotationReport/_form', array('model'=>$model)); ?>