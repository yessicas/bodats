<?php
$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	$model->id_vendor=>array('view','id'=>$model->id_vendor),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Vendor', 'url'=>array('custvend/vend')),
	array('label'=>'Create Vendor', 'url'=>array('custvend/vendcreate')),
	array('label'=>'View Vendor', 'url'=>array('custvend/vendview', 'id'=>$model->id_vendor)),
	array('label'=>'Update Vendor', 'url'=>array('custvend/vendupdate', 'id'=>$model->id_vendor)),
	array('label'=>'Delete Vendor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('vendor/delete','id'=>$model->id_vendor),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

	<div id="content">
<h2>Update Vendor <font color="#BD362F"> #
<?php echo $model->VendorName; ?></font></h2>
<hr>
</div>

<?php echo $this->renderPartial('../vendor/_form_update',array('model'=>$model)); ?>