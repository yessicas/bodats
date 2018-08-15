<?php
$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	'Create',
);

$this->menu=array(
	 array('label'=>'Manage Vendor', 'url'=>array('custvend/vend')),
	 array('label'=>'Create Vendor', 'url'=>array('custvend/vendcreate')),

);
?>
<div id="content">
<h2>Create Vendor</h2>
<hr>
</div>


<?php echo $this->renderPartial('../vendor/_form', array('model'=>$model)); ?>