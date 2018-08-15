<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Create',
);

$TypePR = $model->TypePR;
$SubTitle = "Purchase Request (PR)";
if($TypePR  == "IM"){
	$SubTitle = "Internal Memo (IM)";
}

$this->menu=array(
array('label'=>$TypePR.' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/prvessel/mode/'.$label)),
array('label'=>'Manage '.$TypePR.' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvessel/mode/'.$label)),
array('label'=>'Approved '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvesselapproved/mode/'.$label.'/approved/1')),
array('label'=>'Rejected '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvesselapproved/mode/'.$label.'/approved/0')),
array('label'=>'Update '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admin'), 'active'=>true),
);
?>

<div id="content">
<h2>Update <?php echo $SubTitle; ?> - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('prvessel', array('model'=>$model, 'modelPurchaseRequestDetail'=>$modelPurchaseRequestDetail, 'label'=>$label,'mode'=>$mode)); ?>