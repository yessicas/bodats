<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    $model->id_purchase_request,
);

$this->menu = array(
    array('label' => 'PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/prvessel/mode/' . $label)),
    array('label' => 'Manage PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admvessel/mode/' . $label)),
    array('label' => 'Approved PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admvesselapproved/mode/' . $label . '/approved/1')),
    array('label' => 'Rejected PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admvesselapproved/mode/' . $label . '/approved/0')),
    array('label' => 'View Detail PR ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admin'), 'active' => true),
);
?>


<?php if (Yii::app()->user->hasFlash('success')): ?>

    <div class = "animated flash">
        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;', // false equals no close link
            'alerts' => array(// configurations per alert type
                // success, info, warning, error or danger
                'success' => array('closeText' => '&times;'),
            ),
        ));
        ?>
    </div>

<?php endif; ?>
<div id="content">
    <h2>View Detail Purchase Request (PR) - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
    <hr>
</div>

<?php
if ($model->is_mutliple_item == 1) {
    echo '<div class="alert alert-block alert-info">Step 2 | Fill detail information of Purchase Request.</div>';
}
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_purchase_request',
        'PRNumber',
        array(
            'name' => 'PRDate',
            'value' => Yii::app()->dateFormatter->formatDateTime($model->PRDate, "medium", ""),
        ),
        //	'PRDate',
        //'PRNo',
        //'PRMonth',
        //'PRYear',
        //'id_po_category',
        array('label' => 'PR. Category', 'value' => $model->PoCategory->category_name),
        array('label' => 'Vessel/Tug', 'value' => $model->Vessel->VesselName),
        //array('label'=>'Amount','value'=>$model->amount." ".$model->MetricPr->metric_name),
        array(
            'label' => 'Amount',
            'value' => function($data) {
                if (isset($data->MetricPr)) {
                    return $data->amount . " " . $data->MetricPr->metric_name;
                } else {
                    return $data->amount;
                }
            },
        ),
        'notes',
        'Status',
    ),
));
?>

<?php
if ($model->is_mutliple_item == 1) {
    echo $this->renderPartial('_additemprvessel', array(
        'model' => $model,
        'label' => $label,
        'mode' => $mode,
            //'id'=>$id,
    ));
}
?>

<b>Requested By: </b>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'requested_user',
        'requested_date',
        'ip_user_requested',
    ),
));
?>

<?php if ($model->approved_user != "") { ?>
    Approval/Rejected By:
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            //'id_purchase_request',
            //'Status',
            'approved_user',
            'approval_date',
            'ip_user_approved',
            'approval_notes'
        ),
    ));
    ?>
<?php } ?>


