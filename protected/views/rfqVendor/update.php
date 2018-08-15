<?php
$this->breadcrumbs=array(
	'Rfq Vendors'=>array('index'),
	$model->id_rfq_vendor=>array('view','id'=>$model->id_rfq_vendor),
	'Update',
);

	$this->menu=array(
	array('label'=>'Update RfqVendor','url'=>array('rfqvendor/update','id'=>$model->id_rfq_vendor)),
	array('label'=>'Create RfqVendor','url'=>array('proc/vendcreate')),
	array('label'=>'View RfqVendor','url'=>array('rfqvendor/view','id'=>$model->id_rfq_vendor)),
	array('label'=>'Manage RfqVendor','url'=>array('proc/vend')),
	);
	?>
<div id="content">
	<h2>Update RfqVendor<font color=#BD362F> <?php echo $model->id_rfq_vendor; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../RfqVendor/_form',array('model'=>$model)); ?>