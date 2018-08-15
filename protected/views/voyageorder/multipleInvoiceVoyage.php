<?php
$this->breadcrumbs = array(
    'Voyage Orders' => array('index'),
    'Manage',
);

InvoiceDisplayer::displayTabInvoiceVoyage($this, 4);

//Yii::app()->clientScript->registerScript('search', "
//	$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//	});
//	$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('voyage-order-grid', {
//	data: $(this).serialize()
//	});
//	return false;
//	});
//	");
?>
<?php
if (isset($mode))
    $label = TextDisplayHelper::displayLabelFromMode($mode);
else
    $label = "";
?>

<div id="content">
    <h2>Multiple Invoice Voyage</h2>
    <hr>
</div>

<?php
echo VoyageOrderDisplayer::displayVOPositionImage($model->status);
$hour = '';
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

<?php if (Yii::app()->user->hasFlash('error')): ?>

    <div class = "animated flash">
        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;', // false equals no close link
            'alerts' => array(// configurations per alert type
                // success, info, warning, error or danger
                'error' => array('closeText' => '&times;'),
            ),
        ));
        ?>
    </div>

<?php endif; ?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl("invoicevoyage/createmultipleinvoice/", array("id" => $model->id_voyage_order)),
    'type' => 'horizontal',
    'method' => 'post',
        ));
?>

<!--
<div class="view">
<?php
//$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
//'action'=>'demand/pilihan',
//'method'=>'post',
//)); 
?>

    <div class="form-horiz ">
<?php //echo $form->labelEx($model,'customername');   ?>
        <label class="control-label required" for="customer"><?php echo "Customer &nbsp" ?><span class="required">*</span></label>  label manual 

        <div class="controls">
<?php
echo CHtml::dropDownList('Customer', '', CHtml::listData(Customer::model()->findAll(array(
                    //'condition' => 'VesselType = :VesselType',
                    'order' => 'CompanyName ASC',
                        /* 'params' => array(
                          ':VesselType' => "TUG",
                          ), */
                )), 'id_customer', 'CompanyName'), array('prompt' => Yii::t('strings', '-- Select Customer --'),
    'class' => 'span4',
    'ajax' => array(
        'type' => 'GET',
        'url' => CController::createUrl('settypetugbarge/FindBargeVesselByTugVessel') /* , 'update'=>'#id_update' */, 'success' => 'finebarge')));
?>
        </div>
    </div>

    <div class="form-actions">

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'warning',
    'label' => 'Display',
));
?>
    </div>
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


<?php if (Yii::app()->user->hasFlash('error')): ?>

                        <div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true,
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'alerts' => array(// configurations per alert type
            // success, info, warning, error or danger
            'error' => array('closeText' => '&times;'),
        ),
    ));
    ?>
                        </div>

<?php endif; ?>
-->
<?php // $modeVar = (isset($_GET["mode"])) ? $_GET["mode"] : ''; ?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'voyage-order-grid',
    'dataProvider' => $model->searchbyFinishVogare(),
    'type' => 'striped bordered condensed',
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        array(
            'value' => 'CHtml::checkBox("cid[$data->id_voyage_order]",null,array("value"=>0,"id"=>"cid_".$data->id_voyage_order))',
            'type' => 'raw',
            'htmlOptions' => array('width' => 5),
        ),
        array(
            'header' => 'Type',
            'name' => 'bussiness_type_order',
            'value' => '$data->BussinessTypeOrder->bussiness_type_order',
            'filter' => CHtml::listData(BussinessTypeOrder::model()->findAll(), 'id_bussiness_type_order', 'bussiness_type_order'),
        ),
        array(
            'header' => 'Customer',
            //'name'=>'',
            'value' => '$data->Quotation->Customer->CompanyName',
        ),
        'VoyageNumber',
        array('header' => 'Tug',
            'name' => 'BargingVesselTug',
            //'value'=>'$data->VesselTug->VesselName',
            'value' => function($data) {
                if (isset($data->VesselTug)) {
                    return $data->VesselTug->VesselName;
                } else {
                    return " -- VesselTug NOT FOUND -- (" . $data->BargingVesselTug . ")";
                }
            },
            'filter' => CHtml::listData(Vessel::model()->findAll(array(
                        'condition' => 'VesselType = :VesselType',
                        'params' => array(
                            ':VesselType' => "TUG",
                        ),
                    )), 'id_vessel', 'VesselName'),
        ),
        array('header' => 'Barge',
            'name' => 'BargingVesselBarge',
            //'value'=>'$data->VesselBarge->VesselName',
            'value' => function($data) {
                if (isset($data->VesselBarge)) {
                    return $data->VesselBarge->VesselName;
                } else {
                    return " -- VesselBarge NOT FOUND -- (" . $data->BargingVesselBarge . ")";
                }
            },
            'filter' => CHtml::listData(Vessel::model()->findAll(array(
                        'condition' => 'VesselType = :VesselType',
                        'params' => array(
                            ':VesselType' => "BARGE",
                        ),
                    )), 'id_vessel', 'VesselName'),
        ),
        array('header' => 'Port Of Loading',
            'name' => 'BargingJettyIdStart',
            'value' => '$data->JettyOrigin->JettyName',
            'filter' => CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
        ),
        array('header' => 'Port Of Unloading',
            'name' => 'BargingJettyIdEnd',
            'value' => '$data->JettyDestination->JettyName',
            'filter' => CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
        ),
        array(
            'header' => 'Start Date',
            'name' => 'ActualStartDate',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->ActualStartDate, "medium","short")',
        ),
        array(
            'name' => 'Capacity',
            'value' => 'NumberAndCurrency::formatNumber($data->Capacity)',
        ),
        'status',
        'invoice_created',
        array('header' => 'Voyage Closing Documents',
            'type' => 'raw',
            'htmlOptions' => array('width' => '250px'),
            'value' =>
            function($data) {
                //Close Voyage Document
                $number_doc = VoyageCloseDB::getNumberOfVoyageDocumentStatus($data->id_voyage_order);
                if ($number_doc <= 0) {
                    $status_close_voy_doc_text = "Not Yet";
                    $nav_voy_closed_doc = CHtml::link("Create", Yii::app()->createUrl("voyageclose/create_voyage_document", array("id" => $data->id_voyage_order)));
                } else {
                    $status_close_voy_doc_text = "Uploaded <br>(" . $number_doc . " docs)";
                    $nav_voy_closed_doc = CHtml::link("View", Yii::app()->createUrl("voyageclose/view_voyage_document", array("id" => $data->id_voyage_order)));
                    $nav_voy_closed_doc .= ' | ' . CHtml::link("Update", Yii::app()->createUrl("voyageclose/create_voyage_document", array("id" => $data->id_voyage_order)));
                }

                //TimeSheet
                $number_activity_timesheet = VoyageCloseDB::getNumberOfTimesheetActivity($data->id_voyage_order);
                //$nav_timesheet_update = CHtml::link("Update",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1)));
                $nav_timesheet_update = CHtml::link("View", Yii::app()->createUrl("timesheet/update_daily", array("id" => $data->id_voyage_order, "inVoyageClose" => 1, "inView" => 1)));

                //so
                $SO = So::model()->findByPk($data->id_so);
                if ($SO->SI_is_attach == 0) {
                    $status = "Not Yet";
                    $nav = CHtml::link("Upload", Yii::app()->createUrl("so/updateattch", array("id" => $data->id_so)), array("class" => "various fancybox.ajax"));
                } else {
                    $status = "Uploaded";
                    $nav = CHtml::link("View", Yii::app()->request->baseUrl . "/repository/so/" . $data->So->SI_Attachment, array("target" => "_blank", "title" => "View Attachment"));
                    $nav .= ' | ' . CHtml::link("Update", Yii::app()->createUrl("so/updateattch", array("id" => $data->id_so)), array("class" => "various fancybox.ajax"));
                }
                return
                        '<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td width="100px">Closed Voyage Document</td>
						<td width="60px">' . $status_close_voy_doc_text . '</td>
						<td width="90px">' . $nav_voy_closed_doc . '</td>
					</tr>
                    <tr>
                        <td>Shipping Order Document</td>
                        <td>' . $status . '</td>
                        <td>' . $nav . '</td>
                    </tr>
					<tr>
						<td>Timesheet</td>
						<td>' . $number_activity_timesheet . ' activities</td>
						<td>' . $nav_timesheet_update . '</td>
					</tr>
				</table>';
            }
        ,
        ),
       /* array(
            'header' => 'Create INVOICE - Single Invoice',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{creates}{view}{update}',
            'htmlOptions' => array('width' => '90px'),
            //'header'=>'',
            'buttons' => array(
                'creates' =>
                array(
                    'url' => 'Yii::app()->createUrl("invoicevoyage/create",array("id"=>$data->id_voyage_order))',
                    // 'icon'=>'share',
                    'label' => 'Create Invoice',
                    //'visible'=>'$data->invoice_created==0',
                    'visible' => '!InvoiceDB::getInvoiceByIDVoyageOrder($data->id_voyage_order)',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'Create Invoice',
                    ),
                ),
                'view' =>
                array(
                    'url' => 'Yii::app()->createUrl("invoicevoyage/view",array("id"=>$data->id_voyage_order))',
                    //'visible'=>'$data->invoice_created==1',
                    'visible' => 'InvoiceDB::getInvoiceByIDVoyageOrder($data->id_voyage_order)',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'View Invoice',
                    ),
                ),
                'update' =>
                array(
                    'url' => 'Yii::app()->createUrl("invoicevoyage/update",array("id"=>$data->id_voyage_order))',
                    'icon' => 'pencil',
                    //'visible'=>'$data->invoice_created==1',
                    'visible' => 'InvoiceDB::getInvoiceByIDVoyageOrder($data->id_voyage_order)',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'Update Invoice',
                    ),
                ),
            ),
        ),*/
    //'IdNodeDestination',
    //'IdNodeDestination',
    //'id_voyage_order',
    //'VONo',
    //'VOMonth',
    //'VOYear',
    //'id_quotation',
    //'id_so',
    //'id_voyage_order_plan',
    //'status',
    //CheckBox        
    //'VoyageOrderNumber',
    //'bussiness_type_order',
    //'BargingVesselTug',
    //'BargingVesselBarge',
    //array('header'=>'End Date','name'=>'ActualEndDate'),
    //'BargeSize',
    //'Capacity',
    //'TugPower',
    //'BargingJettyIdStart',
    //'BargingJettyIdEnd',
    /*
      array(
      'name'=>'Price',
      'value'=>'$data->Price." ".$data->Currency->currency',
      ),
     */
    /*
      array(
      'name'=>'status' ,
      //'filter' =>array('VO SAILING'=>'VO SAILING','VO FINISH'=>'VO FINISH')
      'filter'=>false,
      ),
     */
    /*
      'StartDate',
      'EndDate',
      'ActualStartDate',
      'ActualEndDate',
      'period_year',
      'period_month',
      'period_quartal',
      'Price',
      'id_currency',
      'change_rate',
      'fuel_price',
      'created_date',
      'created_user',
      'ip_user_updated',
     */

    /*
      array('header'=>'Closed Voyage Feature',
      'type'=>'raw',
      'htmlOptions'=>array('width'=>'140px'),
      'value'=>'"
      Closed Voyage Report <br>
      Timesheet <br>
      PR Intencive <br>
      PR Agency <br>
      Cost actual Agency <br>
      PR Outbond <br>
      Debit Note <br>
      Closed Voyage Document <br>
      "',
      ),

      array('header'=>'Status Created',
      'type'=>'raw',
      'htmlOptions'=>array('width'=>'50px'),
      'value'=>'
      VoyageCloseDB::GetStatusClosedVoyageReport($data->status)."<br>".
      VoyageCloseDB::GetviewstatusvoyageTimeSheet($data->id_voyage_order)."<br>".
      ""."<br>".
      ""."<br>".
      ""."<br>".
      ""."<br>".
      ""."<br>".
      VoyageCloseDB::Getviewstatusvoyageclosedocument($data->id_voyage_order)."<br>"
      ',
      ),
     */
    ),
));
?>

<div style="margin:0px; padding-left: 30px; padding-top:0px;">
    <img src="repository/icon/arrow_ltr.png"> Select Multiple Invoice
</div>

<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Generate Multiple Invoice',
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

