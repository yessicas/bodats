<?php
$this->breadcrumbs=array(
	'Rfq Vendors'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create RfqVendor','url'=>array('proc/vendcreate')),
array('label'=>'Manage RfqVendor','url'=>array('proc/vend')),
);
?>
<div id="content">
<h2>Create RfqVendor</h2>
<hr>
</div>


<?php echo $this->renderPartial('../RfqVendor/_form', array('model'=>$model)); ?>