<?php
$this->breadcrumbs=array(
	'Setting Tax Reports'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Manage Setting Tax Report','url'=>array('setting/mastax')),
array('label'=>'Create Setting Tax Report','url'=>array('setting/mastaxcreate')),

);
?>
<div id="content">
<h2>Create Setting Tax Report</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SettingTaxReport/_form', array('model'=>$model)); ?>