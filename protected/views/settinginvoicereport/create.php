<?php
$this->breadcrumbs=array(
	'Setting Invoice Reports'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Setting Invoice Report','url'=>array('setting/invo')),
array('label'=>'Create Setting Invoice Report','url'=>array('setting/invocreate')),

);
?>
<div id="content">
<h2>Create Setting Invoice Report</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SettingInvoiceReport/_form', array('model'=>$model)); ?>