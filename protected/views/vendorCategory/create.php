<?php
$this->breadcrumbs=array(
	'Vendor Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage VendorCategory','url'=>array('admin')),
array('label'=>'Create VendorCategory','url'=>array('create')),

);
?>
<div id="content">
<h2>Create VendorCategory</h2>
<hr>
</div>


<?php echo $this->renderPartial('../VendorCategory/_form', array('model'=>$model)); ?>