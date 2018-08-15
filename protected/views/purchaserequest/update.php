<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	$model->id_purchase_request=>array('view','id'=>$model->id_purchase_request),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
	array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
	array('label'=>'View Purchase Request','url'=>array('purchaserequest/view','id'=>$model->id_purchase_request)),
	array('label'=>'Update Purchase Request','url'=>array('purchaserequest/update','id'=>$model->id_purchase_request)),
	array('label'=>'Delete Purchase Request','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_purchase_request),'confirm'=>'Are you sure you want to delete this item?')),
	);
	?>

	
<div id="content">
<h2>Update Purchase Request <?php echo $model->id_purchase_request; ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>