<?php
$this->breadcrumbs=array(
	'Fuel Transaction Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Fuel Transaction Type','url'=>array('master/masfuel')),
array('label'=>'Create Fuel Transaction Type','url'=>array('master/masfuelcreate')),

);
?>
<div id="content">
<h2>Create Fuel Transaction Type</h2>
<hr>
</div>


<?php echo $this->renderPartial('../FuelTransactionType/_form', array('model'=>$model)); ?>