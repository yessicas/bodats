<?php
$this->breadcrumbs=array(
	'Customer Bank Accs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Customer Bank Acc','url'=>array('admin')),
array('label'=>'Create Customer Bank Acc','url'=>array('create')),

);
?>
<div id="content">
<h2>Create Customer Bank Acc</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CustomerBankAcc/_form', array('model'=>$model)); ?>