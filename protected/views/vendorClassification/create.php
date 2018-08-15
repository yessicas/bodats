<?php
$this->breadcrumbs=array(
	'Vendor Classifications'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage VendorClassification','url'=>array('admin')),
array('label'=>'Create VendorClassification','url'=>array('create')),

);
?>
<div id="content">
<h2>Add Vendor Classification</h2>
<hr>
</div>


<?php echo $this->renderPartial('../VendorClassification/_form', array('model'=>$model)); ?>