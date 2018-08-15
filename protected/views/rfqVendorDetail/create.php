<?php
$this->breadcrumbs=array(
	'Rfq Vendor Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create RfqVendorDetail','url'=>array('rfqvendordetail/create')),
array('label'=>'Manage Rfq Vendor','url'=>array('proc/vend')),
);
?>
<div id="content">
<h2>Create RfqVendorDetail</h2>
<hr>
</div>


<?php echo $this->renderPartial('../RfqVendorDetail/_form', array('model'=>$model)); ?>