<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    'Create',
);

$TypePR = $model->TypePR;
$SubTitle = "Purchase Request (PR)";
if ($TypePR == "IM") {
    $SubTitle = "Internal Memo (IM)";
}

$this->menu = array(
    array('label' => 'PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/prothers/mode/' . $label), 'active' => true),
    array('label' => 'Manage PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admothers/mode/' . $label)),
    array('label' => 'Approved PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admothersapproved/mode/' . $label . '/approved/1')),
    array('label' => 'Rejected PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admothersapproved/mode/' . $label . '/approved/0')),
);

//echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $label, $this, 4, $action);
?>

<div id="content">
    <h2><?php echo ucwords($action) . " " . $SubTitle; ?> - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
    <hr>
</div>

<?php
echo $this->renderPartial('_prothers', array(
    'model' => $model,
    'label' => $label,
));
?>