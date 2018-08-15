<?php
$this->breadcrumbs=array(
	'Payroll Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Payroll Item','url'=>array('master/masrol')),
array('label'=>'Create Payroll Item','url'=>array('master/masrolcreate')),

);
?>
<div id="content">
<h2>Create Payroll Item</h2>
<hr>
</div>


<?php echo $this->renderPartial('../PayrollItem/_form', array('model'=>$model)); ?>