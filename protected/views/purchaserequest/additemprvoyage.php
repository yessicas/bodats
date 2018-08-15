<?php
$cs = Yii::app()->clientScript;
$cs->registerCSSFile('css/pmlstyle.css');
?>
<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    $model->id_purchase_request,
);
$TypePR = $model->TypePR;
$SubTitle = "Purchase Request (PR)";
if ($TypePR == "IM") {
    $SubTitle = "Internal Memo (IM)";
}

echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $label, $this, 4, $action . " Item ");
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
    <h2><?php echo ucwords($action); ?> Detail Purchase Request (PR) - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
    <hr>
</div>

<?php
if ($action == "create") {
    echo '<div class="alert alert-block alert-info">Step 2 | Fill detail information of Purchase Request.</div>';
}
?>


<div class="view" style="margin-left:24px; width: 790px;">
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id_purchase_request',
        'PRNumber',
        //'PRDate',
        array('label' => 'PR. Date', 'value' => Timeanddate::getDisplayStandardDate($model->PRDate)),
        //'PRNo',
        //'PRMonth',
        //'PRYear',
        //'id_po_category',
        array('label' => 'PR. Category', 'value' => $model->PoCategory->category_name),
        //array('label'=>'Amount','value'=>$model->amount." ".$model->MetricPr->metric_name),
        //'amount',
        //'metric',
        //array('label'=>'Metric PR','value'=>$model->MetricPr->metric_name),
        //'dedicated_to',
        //'id_vessel',
        //'id_voyage_order',
        'notes',
        //'is_mutliple_item',
        //'requested_user',
        //'requested_date',
        //'ip_user_requested',
        'Status',
    //'approved_user',
    //'approval_date',
    //'ip_user_approved',
    ),
));
?>
</div>

<?php
echo VoyageOrderDisplayer::displayVoyageInfo3column($model->id_voyage_order, '800px');
?>

<?php
if ($action == "create") {
    ?>
    <div class="tambah" id="detail_quotation">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('strings', 'Add Purchase Item'),
            'icon' => 'plus white',
            'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            //'url'=>array('create'),   
            'url' => array('purchaserequest/createitemprvoyage', 'id' => $model->id_purchase_request, 'mode' => $label),
            'htmlOptions' => array(
                'class' => 'various fancybox.ajax',
            ),
        ));
        ?> 
    </div>
        <?php
    }
    ?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.various',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 400,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => false, // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
?>

<div id="statusMsg"></div> <!--- message apabila nol  and reload  -->

<div style="width: 800px;">
<?php
if ($action == "create")
    $visibleAction = true;
else
    $visibleAction = false;

//Display Purchase Item Detail
if ($label == "agency") {
    $this->widget('SpecialTbGridView', array(
        'id' => 'purchase-request-detail-grid',
        'type' => 'bordered striped condensed',
        'dataProvider' => $modeldetail->search(false, 100),
        'param1' => $visibleAction,
        //'ajaxUpdate'=>false,
        //'filter'=>$modeldetail,
        'columns' => array(
            array(
                'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
            //'id_purchase_request_detail',
            //'id_purchase_request',
            //'purchase_item_table',
            //'id_item',
            'agencyitem.agency_item',
            //'item_add_info',
            'quantity',
            'metric',
            'status',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'afterDelete' => 'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
                'visible' => $visibleAction,
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/updateitemprvoyage",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>$_GET["action"]))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                        ),
                    ),
                    'delete' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/deleteitemprvoyage",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
                    ),
                ),
            ),
        ),
    ));
}
?>
</div>