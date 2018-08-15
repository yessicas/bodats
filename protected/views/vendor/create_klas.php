<?php
$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	'Create',
);

$this->menu=array(
	 array('label'=>'Manage Vendor', 'url'=>array('custvend/vend')),
	 array('label'=>'Create Vendor', 'url'=>array('custvend/vendcreate')),
	 array('label'=>'Create Vendor Classification', 'url'=>array('custvend/vendcreate2')),

);
?>

<div id="content">
<h2>Create Vendor Classification</h2>
<hr>
</div>


<?php echo $this->renderPartial('../vendor/_form_klas', array('model'=>$model)); ?>