<?php
$this->breadcrumbs=array(
	'Purchase Request Picas'=>array('index'),
	$model->id_purchase_request_pica=>array('view','id'=>$model->id_purchase_request_pica),
	'Update',
);

	$this->menu=array(

	array('label'=>'Manage Pica','url'=>array('purchaserequest/adminprpica')),
	//array('label'=>'List PurchaseRequestPica','url'=>array('index')),
	//array('label'=>'Create PurchaseRequestPica','url'=>array('create')),
	array('label'=>'View Pica','url'=>array('view','id'=>$model->id_purchase_request)),
	array('label'=>'Update Pica','url'=>array('update','id'=>$model->id_purchase_request),'active'=>true),
	//array('label'=>'Delete Pica','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_purchase_request_pica),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>

	<div id="content">
	<h2>Update Pica <?php echo $model->id_purchase_request_pica; ?></h2>
	<hr>
</div>

<h3><font color=#BD362F> PR INFO </font></h3>

<?php echo $this->renderPartial('viewrequest'); ?>

<hr>

<h3><font color=#BD362F> PICA  </font></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>