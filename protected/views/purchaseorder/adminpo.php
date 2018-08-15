<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    'Manage',
);


$this->menu = array(
//array('label'=>'PO from multiple item','url'=>array('purchaseorder/po')),
//array('label'=>'Purchase Request Appproved','url'=>array('purchaseorder/prapproved')),
);


PurchaseDisplayer::displayTabLabelPOFromPR($this, 1);
?>


<?php
if (isset($mode))
    $label = TextDisplayHelper::displayLabelFromMode($mode);
else
    $label = "";
?>
<div id="content">
    <h2>Create PO <?php echo $label; ?> from Approval PR</h2>
    <hr>
</div>

<div class="alert alert-info">
    You can create a PO with two methods:<br>
    A) First Method : Create PO from single PR by click Create PO in the corresponding row<br>
    B) Second Method : Create PO from multiple PR by checking the PR rows. After check related PR, you can select button "Create PO from Multiple PR"
</div>

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
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl("purchaseorder/createpomultiplepr/"),
    'type' => 'horizontal',
    'method' => 'post',
        ));
?>

<?php
$pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
echo'
				<div style="margin:0 0 -20px 25px">' .
 CHtml::dropDownList('pageSize', $pageSize, array(5 => 5, 10 => 10, 15 => 15, 30 => 30, 50 => 50, 100 => 100), // kalo ini ada yang di rubah atau di tambahkan parameter angka nya , maka untuk mencoba nya kembali harus logout dulu untuk mereset state param pagesize nya
        array('onchange' =>
    "$.fn.yiiGridView.update('purchase-request-grid',{ data:{pageSize: $(this).val() }})",
    'style' => 'width:90px;',
))
 . ' Records Per Page</div>';
?>

<?php $modeVar = (isset($_GET["mode"])) ? $_GET["mode"] : ''; ?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'purchase-request-grid',
    'dataProvider' => $model->search($modeVar),
    'type' => 'striped bordered condensed',
    'filter' => $model,
    'columns' => array(
        //'id_purchase_request',
        array(
            'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        /*
          array(
          'header' => "chk",
          'class' => 'CCheckBoxColumn',
          'selectableRows' => null,
          //'checked' => '($data->PRDate !== "john")',
          ),
         */
        array(
            //'name'=>'id_purchase_request',             
            'value' => 'CHtml::checkBox("cid[$data->id_purchase_request]",null,array("value"=>0,"id"=>"cid_".$data->id_purchase_request))',
            'type' => 'raw',
            'htmlOptions' => array('width' => 5),
        //'visible'=>false,
        ),
        //'PRNumber',
        array(
            'name' => 'PRNumber',
            'value' => '$data->PRNumber." ".PurchaseRequestDB::getDedicatedTo($data)',
            'type' => 'raw',
            'htmlOptions' => array('width' => 5),
        //'visible'=>false,
        ),
        array(
            'header' => 'Vessel/ Voyage',
            'name' => 'VesselName_VoyageOrderNumber',
            'value' => 'PurchaseRequestDB::getDedicatedToVesselOrVoyage($data)',
            'type' => 'raw',
            //'filter'=>false,
            'htmlOptions' => array('style' => 'width:100px;'),
        //'visible'=>false,
        ),
        array(
            'name' => 'PRDate',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
        ),
        //'PRDate',
        //'PRNo',
        //'PRMonth',
        //'PRYear',
        //'id_po_category',
        /*
          array(
          'name'=>'id_po_category',
          'value'=>'$data->PoCategory->category_name',
          'filter'=>CHtml::listData(PoCategory::model()->findAll(
          //array(
          //'condition' => 'id_parent = :id_parent',
          //'params' => array(
          //    ':id_parent' => "10400",
          //)),

          ), 'id_po_category', 'category_name'),


          ),
         */
        array(
            'name' => 'id_po_category',
            //'value'=>'$data->PoCategory->category_name',
            'value' => function($data) {
                if (isset($data->PoCategory)) {
                    return $data->PoCategory->category_name;
                } else {
                    return " -- CATEGORY NOT FOUND -- (" . $data->id_po_category . ")";
                }
            },
            //'filter'=>PurchaseRequestDB::getPRCategory(),
            'filter' => false,
        ),
        //'amount',
        array(
            'name' => 'amount',
            'filter' => false,
        ),
        //'metric',
        array(
            'name' => 'metric',
            //'value'=>'$data->MetricPr->metric_name',
            'value' => function($data) {
                if (isset($data->MetricPr)) {
                    return $data->MetricPr->metric_name;
                } else {
                    return " -- METRIC NOT FOUND -- (" . $data->metric . ")";
                }
            },
            //'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),   
            'filter' => false,
        ),
        //'dedicated_to',
        //'id_vessel',
        /*
          array(
          'name'=>'id_vessel',
          'value'=>'CHtml::encode($data->Vessel->VesselName)',
          'filter'=>CHtml::listData(Vessel::model()->findAll(array(
          'condition' => 'VesselType = :VesselType',
          'params' => array(
          ':VesselType' => "TUG",
          ),
          )), 'id_vessel', 'VesselName'),


          ),
         */
        //'id_voyage_order',
        'notes',
        //'is_mutliple_item',
        //'requested_user',
        //'requested_date',
        //'ip_user_requested',
        //'Status',
        array(
            'header' => 'View Detail PR',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{views}',
            'buttons' => array(
                'views' =>
                array(
                    'label' => 'View PR',
                    'url' => function($data) use ($modeVar) {
                        return Yii::app()->createUrl("purchaserequest/viewpr", array("id" => $data->id_purchase_request, "mode" => $modeVar));
                    }
                    ,
                    'options' => array(
                        'class' => 'various fancybox.ajax',
                        'rel' => '',
                        'title' => 'View PR',
                    ),
                ),
            ),
        ),
        array(
            'header' => 'PR Status',
            'name' => 'Status',
            'value' => 'PurchaseDisplayer::getStatusPurchaseRequest($data->Status)',
            'filter' => false,
        //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
        ),
        'approved_user',
        //'approval_date',
        array(
            'name' => 'approval_date',
            'htmlOptions' => array('width' => '60px'),
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->approval_date, "medium","medium")',
        ),
        //'ip_user_approved',
        array(
            'header' => 'Create PO - Single PR',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('width' => '60px'),
            'template' => '{create}',
            'buttons' => array(
                'create' =>
                array(
                    'url' => 'Yii::app()->createUrl("purchaseorder/createpomultiplepr",array("scid"=>$data->id_purchase_request))',
                    //'icon'=>'share',
                    'label' => 'Create PO ',
                    'visible' => '$data->Status=="PR APPROVED"',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'Create PO',
                    ),
                ),
            ),
        ),
    ),
));
?> 
<div style="margin:0px; padding-left: 30px; padding-top:0px;">
    <img src="repository/icon/arrow_ltr.png"> Select Multiple PR
</div>

<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Create PO from Multiple PR',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>
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

