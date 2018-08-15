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

/*
$this->menu=array(
array('label'=>'Create '.$TypePR.' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admin'), 'active'=>true),
array('label'=>'Manage '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvoyage/mode/'.$label)),
array('label'=>'Approved '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvesselapproved/mode/'.$label.'/approved/1')),
array('label'=>'Rejected '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvesselapproved/mode/'.$label.'/approved/0')),
);
*/
echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $label, $this, 4, $action);
?>

<div id="content">
<h2><?php echo ucwords($action)." ".$SubTitle; ?> - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_prvoyage', 
	array(
		'model'=>$model, 
		'label'=>$label,
		'id'=>$id,
	)); ?>