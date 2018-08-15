<?php
$this->breadcrumbs=array(
	'Setting Spal Reports'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Setting SPAL Report','url'=>array('setting/spal')),
array('label'=>'Create Setting SPAL Report','url'=>array('setting/spalcreate')),

);
?>
<div id="content">
<h2>Create Setting SPAL Report</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SettingSpalReport/_form', array('model'=>$model)); ?>