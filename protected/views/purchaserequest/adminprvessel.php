<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    'Manage',
);

$TypePR = $model->TypePR;
$SubTitle = "Purchase Request (PR)";
if ($TypePR == "IM") {
    $SubTitle = "Internal Memo (IM)";
}

$this->menu = array(
    array('label' => $TypePR . ' ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/prvessel/mode/' . $label)),
    array('label' => 'Manage ' . $TypePR . ' ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admin'), 'active' => true),
    array('label' => 'Approved ' . $TypePR . ' ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admvesselapproved/mode/' . $label . '/approved/1')),
    array('label' => 'Rejected ' . $TypePR . ' ' . TextDisplayHelper::displayLabelFromMode($label), 'url' => array('purchaserequest/admvesselapproved/mode/' . $label . '/approved/0')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('purchase-request-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<style>
    .labelclass{
        color:#cd5934;
    }

    .labelclass:hover{
        text-decoration:underline;
    }
</style>


<script type="text/javascript">

    function approve(id_purchase_request)
    {
        //alert(id_purchase_request);
        var text = "<?php echo Yii::t('strings', 'Are You Sure Approve This Data???') ?>";
        var jawab;

        jawab = confirm(text)
        if (jawab)
        {
            jQuery.ajax({'type': 'post', 'success': allFine, 'url': '<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/approve/id/' + id_purchase_request, 'cache': false, 'data': jQuery(this).parents("form").serialize()});
            return false;
            return false;
        }
    }

    function reject(id_purchase_request)
    {
        //alert(id_purchase_request);


        var text = "<?php echo Yii::t('strings', 'Are You Sure Reject This Data???') ?>";
        var jawab;

        jawab = confirm(text)
        if (jawab)
        {
            jQuery.ajax({'type': 'post', 'success': allFine, 'url': '<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/reject/id/' + id_purchase_request, 'cache': false, 'data': jQuery(this).parents("form").serialize()});
            return false;
            return false;
        }

    }

    function allFine(data) {
        $.fn.yiiGridView.update('purchase-request-grid', {
            data: $(this).serialize()
        });

        $("#results").html(data);

    }
</script>


<div id="content">
    <h2>Manage <?php echo $SubTitle; ?>- <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
    <hr>
</div>

<div id='results'></div>
<div class="alert alert-block alert-info">This table inform about <?php echo $SubTitle; ?> datas that not yet approved.</div>
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

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'purchase-request-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
    'filter' => $model,
    'columns' => array(
        //'id_purchase_request',
        array(
            'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        'PRNumber',
        array(
            'name' => 'PRDate',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
        ),
        //'PRDate',
        //'PRNo',
        //'PRMonth',
        //'PRYear',
        //'id_po_category',
        array(
            'name' => 'id_po_category',
            'value' => '$data->PoCategory->category_name',
            /*
              'filter'=>CHtml::listData(PoCategory::model()->findAll(array(
              'condition' => 'id_parent = :id_parent',
              'params' => array(
              ':id_parent' => "10400",
              ),
              )), 'id_po_category', 'category_name'),
             */
            'filter' => false,
        ),
        'amount',
        //'metric',
        array(
            'name' => 'metric',
            'value' => '$data->MetricPr->metric_name',
            //'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),   
            'filter' => false,
        ),
        //'dedicated_to',
        //'id_vessel',
        array(
            'name' => 'id_vessel',
            'value' => '$data->Vessel->VesselName',
            'filter' => CHtml::listData(Vessel::model()->findAll(array(
                        'condition' => 'VesselType = :VesselType',
                        'params' => array(
                            ':VesselType' => "TUG",
                        ),
                    )), 'id_vessel', 'VesselName'),
        ),
        //'id_voyage_order',
        'notes',
        //'is_mutliple_item',
        //'requested_user',
        //'requested_date',
        //'ip_user_requested',
        //'Status',
        array(
            'name' => 'Status',
            //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
            'filter' => false,
        ),
        //'approved_user',
        //'approval_date',
        //'ip_user_approved',
        array(
            'header' => 'Attachment',
            'type' => 'raw',
            'value' => function($data) {
                $modelPrDetail = PurchaseRequestDetail::model()->findByAttributes(array('id_purchase_request' => $data->id_purchase_request));
                if ($modelPrDetail != null) {
                    return ($modelPrDetail->attachment == "") ? '-' : CHtml::link("View", Yii::app()->request->baseUrl . "/repository/prdetail/" . $modelPrDetail->attachment, array("target" => "_blank", "title" => "View Attachment")) . " " .
                            CHtml::link("Download", Yii::app()->controller->createUrl("purchaserequest/download", array("id" => $modelPrDetail->id_purchase_request)), array("target" => "_blank", "title" => "Download Attachment"));
                } else {
                    return "Detail PR not found (" . $data->id_purchase_request . ")";
                }
            }
        ,
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'view' => array('url' => 'Yii::app()->createUrl("purchaserequest/viewprvessel", array("id"=>$data->id_purchase_request, "mode"=>"' . $label . '"))'),
                'update' => array('url' => 'Yii::app()->createUrl("purchaserequest/updateprvessel", array("id"=>$data->id_purchase_request, "mode"=>"' . $label . '"))'),
                'delete' => array('visible' => 'true'),
            ),
        ),
    ),
));
?> 

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.popup_foto',
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
            'title' => array('type' => 'inside'), // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
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

