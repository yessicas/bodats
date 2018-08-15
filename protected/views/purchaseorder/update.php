<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id_purchase_order=>array('view','id'=>$model->id_purchase_order),
	'Update',
);


$this->menu=array(
//array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
//array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
//array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),

array('label'=>'Purchase Order','url'=>array('purchaseorder/po')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaseorder/prapproved')),

array('label'=>'Update Purchase Order','url'=>array('purchaseorder/update','id'=>$model->id_purchase_request)),
array('label'=>'View Purchase Order','url'=>array('purchaseorder/view','id'=>$model->id_purchase_request)),
);

?>

<div id="content">
<h2>Update Purchase Order <?php echo $model->id_purchase_order; ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('_form_update',array('model'=>$model,'modelpr'=>$modelpr)); ?>