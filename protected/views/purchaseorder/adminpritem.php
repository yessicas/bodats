<?php
$this->breadcrumbs = array(
    'Purchase Requests' => array('index'),
    'Manage',
);

/*
  $this->menu=array(
  array('label'=>'PO from multiple item','url'=>array('purchaseorder/managepritem'), 'active'=>true),
  //array('label'=>'Purchase Request Appproved','url'=>array('purchaseorder/prapproved')),
  );
 */

PurchaseDisplayer::displayTabLabelPOMultipleFromPR($this, 1);
?>


<?php
if (isset($mode))
    $label = TextDisplayHelper::displayLabelFromMode($mode);
else
    $label = "";
?>

<div id="content">
    <h2>Create Purchase Order <?php echo $label; ?> From PR Item - <?php echo TextDisplayHelper::displayLabelFromMode($mode); ?></h2>
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
    'action' => Yii::app()->createUrl("purchaseorder/createpomultipleitem/"),
    'type' => 'horizontal',
    'method' => 'post',
        ));
?>
<?php
/////////////////////////
if ($mode == 'cs_part_asset') {


    $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
    echo'
				<div style="margin:0 0 -20px 25px">' .
    CHtml::dropDownList('pageSize', $pageSize, array(5 => 5, 10 => 10, 15 => 15, 30 => 30, 50 => 50, 100 => 100), // kalo ini ada yang di rubah atau di tambahkan parameter angka nya , maka untuk mencoba nya kembali harus logout dulu untuk mereset state param pagesize nya
            array('onchange' =>
        "$.fn.yiiGridView.update('purchase-request-cs_part_asset-grid',{ data:{pageSize: $(this).val() }})",
        'style' => 'width:90px;',
    ))
    . ' Records Per Page</div>';


    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'purchase-request-cs_part_asset-grid',
        'dataProvider' => $model->search(true, 20),
        'type' => 'striped bordered condensed',
        'afterAjaxUpdate' => 'reinstallDatePicker',
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
                'value' => 'CHtml::checkBox("cid[$data->id_purchase_request_detail]",null,array("value"=>0,"id"=>"cid_".$data->id_purchase_request_detail))',
                'type' => 'raw',
                'htmlOptions' => array('width' => 5),
            //'visible'=>false,
            //'visible'=>'$data->status=="PR APPROVED"',
            ),
            array(
                'header' => 'Item',
                'htmlOptions' => array('width' => '240px'),
                'name' => 'consumable_stock_item_name',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->ConsumableStockItem) {
                        return $data->ConsumableStockItem->consumable_stock_item;
                    } else {
                        return '-';
                    }
                }
            ),
            array(
                'header' => 'Vessel',
                'htmlOptions' => array('width' => '150px'),
                'name' => 'VesselName',
                'type' => 'raw',
                'value' => function($data) {
                    if (isset($data->PurchaseRequest)) {
                        if ($data->PurchaseRequest->Vessel) {
                            return $data->PurchaseRequest->Vessel->VesselName;
                        } else {
                            return '-';
                        }
                    } else {
                        return ' -- NA  (PR NOT FOUND ) --';
                    }
                }
            ),
            array(
                'header' => 'PR Number',
                'htmlOptions' => array('width' => '240px'),
                'name' => 'PRNumber',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->PurchaseRequest) {
                        return $data->PurchaseRequest->PRNumber . "<br>" . PurchaseRequestDB::getDedicatedTo($data->PurchaseRequest);
                    } else {
                        return '-';
                    }
                }
            ),
            array(
                'header' => 'PR Date',
                'htmlOptions' => array('width' => '80px'),
                'name' => 'PRDate',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->PurchaseRequest) {
                        return Yii::app()->dateFormatter->formatDateTime($data->PurchaseRequest->PRDate, "medium", "");
                    } else {
                        return '-';
                    }
                },
                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'PRDate',
                    //'language' => 'id',
                    'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
                    'htmlOptions' => array(
                        'id' => 'datepicker_for_due_date',
                    //'size' => '10',
                    ),
                    'defaultOptions' => array(// (#3)
                        'showOn' => 'focus',
                        'dateFormat' => 'yy-mm-dd',
                        'showOtherMonths' => true,
                        'selectOtherMonths' => true,
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                    )
                        ), true),
            ),
            array(
                'header' => 'View Detail PR',
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{views}',
                'buttons' => array(
                    'views' =>
                    array(
                        'label' => 'View PR',
                        'url' => 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                            'title' => 'View PR',
                        ),
                    ),
                ),
            ),
            /*
              array(
              'name'=>'PRDate',
              'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PR->PRDate, "medium","")',
              ),
             */
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
            /* 		
              array(
              'name'=>'id_po_category',
              'type'=>'raw',
              'value'=>'$data->PurchaseRequest->PoCategory->category_name',
              //'filter'=>PurchaseRequestDB::getPRCategory(),
              ),
             */

            //'amount',
            array(
                'name' => 'quantity',
                'filter' => false,
            ),
            //'metric',
            array(
                'name' => 'metric',
                'value' => '$data->metric',
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
            //'status',
            array(
                'name' => 'status',
                'filter' => false,
            ),
            /*
              array(
              'header'=>'PR Status',
              'name'=>'status',
              'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->status)',
              'filter'=>false,
              //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
              ),
             */
            'PurchaseRequest.approved_user',
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
                //'template'=>'{create}{view}{update}',
                'template' => '{create}',
                'buttons' => array(
                    'create' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaseorder/createpomultiplepr",array("scid"=>$data->id_purchase_request))',
                        //'icon'=>'share',
                        'label' => 'Create PO ',
                        'visible' => '$data->status=="PR APPROVED"',
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
} elseif ($mode == 'ehs') {
    $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
    echo'
				<div style="margin:0 0 -20px 25px">' .
    CHtml::dropDownList('pageSize', $pageSize, array(5 => 5, 10 => 10, 15 => 15, 30 => 30, 50 => 50, 100 => 100), // kalo ini ada yang di rubah atau di tambahkan parameter angka nya , maka untuk mencoba nya kembali harus logout dulu untuk mereset state param pagesize nya
            array('onchange' =>
        "$.fn.yiiGridView.update('purchase-request-ehs-grid',{ data:{pageSize: $(this).val() }})",
        'style' => 'width:90px;',
    ))
    . ' Records Per Page</div>';


    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'purchase-request-ehs-grid',
        'dataProvider' => $model->search(true, 20),
        'type' => 'striped bordered condensed',
        'afterAjaxUpdate' => 'reinstallDatePicker',
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
                'value' => 'CHtml::checkBox("cid[$data->id_purchase_request_detail]",null,array("value"=>0,"id"=>"cid_".$data->id_purchase_request_detail))',
                'type' => 'raw',
                'htmlOptions' => array('width' => 5),
            //'visible'=>false,
            //'visible'=>'$data->status=="PR APPROVED"',
            ),
            array(
                'header' => 'Item',
                'htmlOptions' => array('width' => '240px'),
                'name' => 'ehs_item_name',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->EhsItem) {
                        return $data->EhsItem->ehs_item;
                    } else {
                        return '-';
                    }
                }
            ),
            array(
                'header' => 'Vessel',
                'htmlOptions' => array('width' => '150px'),
                'name' => 'VesselName',
                'type' => 'raw',
                'value' => function($data) {
                    if (isset($data->PurchaseRequest)) {
                        if ($data->PurchaseRequest->Vessel) {
                            return $data->PurchaseRequest->Vessel->VesselName;
                        } else {
                            return '-';
                        }
                    } else {
                        return ' -- NA  (PR NOT FOUND ) --';
                    }
                }
            ),
            array(
                'header' => 'PR Number',
                'htmlOptions' => array('width' => '240px'),
                'name' => 'PRNumber',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->PurchaseRequest) {
                        return $data->PurchaseRequest->PRNumber . "<br>" . PurchaseRequestDB::getDedicatedTo($data->PurchaseRequest);
                    } else {
                        return '-';
                    }
                }
            ),
            array(
                'header' => 'PR Date',
                'htmlOptions' => array('width' => '80px'),
                'name' => 'PRDate',
                'type' => 'raw',
                'value' => function($data) {
                    if ($data->PurchaseRequest) {
                        return Yii::app()->dateFormatter->formatDateTime($data->PurchaseRequest->PRDate, "medium", "");
                    } else {
                        return '-';
                    }
                },
                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'PRDate',
                    //'language' => 'id',
                    'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
                    'htmlOptions' => array(
                        'id' => 'datepicker_for_due_date',
                    //'size' => '10',
                    ),
                    'defaultOptions' => array(// (#3)
                        'showOn' => 'focus',
                        'dateFormat' => 'yy-mm-dd',
                        'showOtherMonths' => true,
                        'selectOtherMonths' => true,
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                    )
                        ), true),
            ),
            array(
                'header' => 'View Detail PR',
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{views}',
                'buttons' => array(
                    'views' =>
                    array(
                        'label' => 'View PR',
                        'url' => 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                            'title' => 'View PR',
                        ),
                    ),
                ),
            ),
            /*
              array(
              'name'=>'PRDate',
              'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PR->PRDate, "medium","")',
              ),
             */
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
            /* 		
              array(
              'name'=>'id_po_category',
              'type'=>'raw',
              'value'=>'$data->PurchaseRequest->PoCategory->category_name',
              //'filter'=>PurchaseRequestDB::getPRCategory(),
              ),
             */

            //'amount',
            array(
                'name' => 'quantity',
                'filter' => false,
            ),
            //'metric',
            array(
                'name' => 'metric',
                'value' => '$data->metric',
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
            //'status',
            array(
                'name' => 'status',
                'filter' => false,
            ),
            /*
              array(
              'header'=>'PR Status',
              'name'=>'status',
              'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->status)',
              'filter'=>false,
              //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
              ),
             */
            'PurchaseRequest.approved_user',
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
                //'template'=>'{create}{view}{update}',
                'template' => '{create}',
                'buttons' => array(
                    'create' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaseorder/createpomultiplepr",array("scid"=>$data->id_purchase_request))',
                        //'icon'=>'share',
                        'label' => 'Create PO ',
                        'visible' => '$data->status=="PR APPROVED"',
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
}
////////////////////////////
else {


    $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
    echo'
				<div style="margin:0 0 -20px 25px">' .
    CHtml::dropDownList('pageSize', $pageSize, array(5 => 5, 10 => 10, 15 => 15, 30 => 30, 50 => 50, 100 => 100), // kalo ini ada yang di rubah atau di tambahkan parameter angka nya , maka untuk mencoba nya kembali harus logout dulu untuk mereset state param pagesize nya
            array('onchange' =>
        "$.fn.yiiGridView.update('purchase-request-grid',{ data:{pageSize: $(this).val() }})",
        'style' => 'width:90px;',
    ))
    . ' Records Per Page</div>';


    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'purchase-request-grid',
        'dataProvider' => $model->search(true),
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
                'value' => 'CHtml::checkBox("cid[$data->id_purchase_request_detail]",null,array("value"=>0,"id"=>"cid_".$data->id_purchase_request_detail))',
                'type' => 'raw',
                'htmlOptions' => array('width' => 5),
            //'visible'=>false,
            //'visible'=>'$data->status=="PR APPROVED"',
            ),
            array('header' => 'Item',
                'type' => 'raw',
                'htmlOptions' => array('width' => '240px'),
                'value' =>
                function($data) {
                    return PurchaseRequestDB::getDetailItem($data);
                }
            ,
            ),
            array('header' => 'PR Number',
                'type' => 'raw',
                'htmlOptions' => array('width' => '240px'),
                'value' =>
                function($data) {
                    return $data->PurchaseRequest->PRNumber . "<br>" . PurchaseRequestDB::getDedicatedTo($data->PurchaseRequest);
                }
            ,
            ),
            //'PurchaseRequest.PRDate',
            array(
                //'name'=>'PR Date',
                'header' => 'PR Date',
                'htmlOptions' => array('width' => '60px'),
                'value' => 'Yii::app()->dateFormatter->formatDateTime($data->PurchaseRequest->PRDate, "medium","")',
            ),
            array(
                'header' => 'View Detail PR',
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{views}',
                'buttons' => array(
                    'views' =>
                    array(
                        'label' => 'View PR',
                        'url' => 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                            'title' => 'View PR',
                        ),
                    ),
                ),
            ),
            /*
              array(
              'name'=>'PRDate',
              'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PR->PRDate, "medium","")',
              ),
             */
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
            /* 		
              array(
              'name'=>'id_po_category',
              'type'=>'raw',
              'value'=>'$data->PurchaseRequest->PoCategory->category_name',
              //'filter'=>PurchaseRequestDB::getPRCategory(),
              ),
             */

            //'amount',
            array(
                'name' => 'quantity',
                'filter' => false,
            ),
            //'metric',
            array(
                'name' => 'metric',
                'value' => '$data->metric',
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
            //'status',
            array(
                'name' => 'status',
                'filter' => false,
            ),
            /*
              array(
              'header'=>'PR Status',
              'name'=>'status',
              'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->status)',
              'filter'=>false,
              //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
              ),
             */
            'PurchaseRequest.approved_user',
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
                //'template'=>'{create}{view}{update}',
                'template' => '{create}',
                'buttons' => array(
                    'create' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaseorder/createpomultiplepr",array("scid"=>$data->id_purchase_request))',
                        //'icon'=>'share',
                        'label' => 'Create PO ',
                        'visible' => '$data->status=="PR APPROVED"',
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
}
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


<?php
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
?>
