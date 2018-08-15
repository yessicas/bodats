<?php
$this->breadcrumbs=array(
	'Rfq Vendor Details'=>array('index'),
	$model->id_rfq_vendor_detail=>array('view','id'=>$model->id_rfq_vendor_detail),
	'Update',
);

	$this->menu=array(
	//array('label'=>'Create RfqVendorDetail','url'=>array('create')),
	array('label'=>'Update RfqVendor Detail','url'=>array('rfqvendordetail/update','id'=>$model->id_rfq_vendor_detail)),
	//array('label'=>'View RfqVendorDetail','url'=>array('view','id'=>$model->id_rfq_vendor_detail)),
	//array('label'=>'Delete RfqVendorDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rfq_vendor_detail),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'View Rfq Vendor','url'=>array('rfqvendor/view','id'=>$model->id_rfq_vendor)),
	);
	?>
<div id="content">
	<h2>Update RfqVendorDetail<font color=#BD362F> <?php echo $model->id_rfq_vendor_detail; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../RfqVendorDetail/_form',array('model'=>$model)); ?>