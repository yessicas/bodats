<?php
$this->breadcrumbs=array(
	'Setting Voyage Reports'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SettingVoyageReport','url'=>array('setting/voyage')),
array('label'=>'Create SettingVoyageReport','url'=>array('setting/voyagecreate')),

);
?>
<div id="content">
<h2>Create SettingVoyageReport</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SettingVoyageReport/_form', array('model'=>$model)); ?>