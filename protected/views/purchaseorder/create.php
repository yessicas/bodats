<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
//array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
//array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),
	
array('label'=>'Purchase Order','url'=>array('purchaseorder/po')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaseorder/prapproved')),
array('label'=>'Create Purchase Order','url'=>array('purchaseorder/create','id'=>$_GET['id'])),
);
?>
<div id="content">
<h2>Create Purchase Order</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelpr'=>$modelpr,)); ?>