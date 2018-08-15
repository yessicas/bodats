<?php
$this->breadcrumbs=array(
	'Payment Tops'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage PaymentTop','url'=>array('master/maspay')),
array('label'=>'Create PaymentTop','url'=>array('master/maspaycreate')),
);
?>
<div id="content">
<h2>Create PaymentTop</h2>
<hr>
</div>


<?php echo $this->renderPartial('../paymentTop/_form', array('model'=>$model)); ?>