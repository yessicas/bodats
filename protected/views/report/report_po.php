<?php
$this->breadcrumbs=array(
	'Crews'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'PO Report', 'url'=>array('report/report_po')),
);

?>
<?php /*
<div id="content">
<h2>PO Report</h2>
<hr>
</div>
*/ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'post',
)); ?>
<div class="view">

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="SalesPlan_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Month',$month,Timeanddate::getlistmonthforsettypetugbarge(),
			array('prompt'=>Yii::t('strings','-- Select Month --'),'class'=>'span4'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Year',$year,Timeanddate::getListyearprevious(),
			array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span4'));?>
	</div>
	</div>

	<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); ?>
    </div>

</div>
<?php $this->endWidget(); ?>

	<div class="form-actions" style="padding: 5px; margin: 0px 0px 0px 0px;">
		<?php
		/*
		$this->widget('bootstrap.widgets.TbButton', array(
				'label' =>Yii::t('strings','Export to Excel'),
				'icon'=>'print white',
				'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				//'url'=>array('create'),
				//'size'=>'small',
				'url'=>array('export'),
				'htmlOptions' => array(
									   'target'=>'_blank',
										),
				)); */
		?>

		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
				'label' =>Yii::t('strings','Export to CSV'),
				'icon'=>'print white',
				'type' => 'success',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				//'url'=>array('create'),
				//'size'=>'small',
				'url'=>array('exportCsv', 'month'=>$month, 'year'=>$year),
				'htmlOptions' => array(
									   'target'=>'_blank',
										),
				));
		?>
	</div>
<br>


<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),

    ),
	));
	?>
</div>

<?php endif; ?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-order-grid',
'type' => 'striped bordered condensed',
'afterAjaxUpdate' => 'reinstallDatePicker',
'dataProvider'=>$model->search(100, false),
'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),


		//'id_purchase_order',
		//'id_purchase_request',
		//'id_vendor',
		//'up',



		//'PO.PONumber',
		array(
                'name'=>'PRNumber',
                'header'=>'PR Number',
                'type'=>'raw',
                'value'=>function($data){
					return ReportPO::getPRNumber($data);
				},
        ),
		array(
                'name'=>'PONumber',
                'header'=>'PO Number',
                'type'=>'raw',
                'value'=>function($data){
					return ReportPO::getPONumber($data);
				},
        ),

		/*
		array(
				'header'=>'PO Date',
                'type'=>'raw',
                //'value'=>'Timeanddate::getDisplayReportDate($data->PO->PODate)',
				'htmlOptions'=>array('style'=>'width:100px;'),
				'value'=>function($data){
					return Timeanddate::getDisplayReportDate($data->PO->PODate);
				},
        ),
		*/
		array(
                'name'=>'PODate',
                'header'=>'PO Date',
				'htmlOptions'=>array('style'=>'width:100px;'),
                'type'=>'raw',
                'value'=>function($data){
					return ReportPO::getPODate($data);
				},
				 'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,
								'attribute'=>'PODate',
								//'language' => 'id',
								'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
								'htmlOptions' => array(
									'id' => 'datepicker_for_due_date_1',
									'size' => '10',
								),
								'defaultOptions' => array(
									'showOn' => 'focus',
									'dateFormat' => 'yy-mm-dd',
									'showOtherMonths' => true,
									'selectOtherMonths' => true,
									'changeMonth' => true,
									'changeYear' => true,
									'showButtonPanel' => true,
								)
							),
						true),
        ),






		/*
		array(
			'header'=>'Vessel / Voyage',
			'name'=>'VesselName_VoyageOrderNumber',
			//'value'=>'PurchaseRequestDB::getDedicatedToVesselOrVoyageFromPO($data->PO)',
			'value'=>function($data){
					return PurchaseRequestDB::getDedicatedToVesselOrVoyageFromPO($data->PO);
				},
			'type'=>'raw',
			'filter'=>false,
			'htmlOptions'=>array('style'=>'width:100px;'),
			//'visible'=>false,
        ),
		*/
		array(
			'header'=>'Vessel / Voyage',
			'name'=>'VesselName_VoyageOrderNumber',
			'value'=>function($data){
					return ReportPO::getVesselOrVoyage($data);
				},
			//'filter'=>false,
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'width:100px;'),
        ),



		//'PODate',
		//'Vendor.VendorName',

		array(
			'header'=>'Item',
			'value'=>function($data){
				return PurchaseRequestDB::getItemDetailPR($data);
			},
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'width:150px;'),
        ),

		//'PoCategory.category_name',
		array(
			'header'=>'Category',
			'name'=>'id_po_category',
			'value'=>function($data){
					return ReportPO::getPOCategory($data);
			},
			'filter'=>PurchaseRequestDB::getPRCategory(),
			//'type'=>'raw',
        ),


		//'PurchaseRequest.dedicated_to',
		/*
		array('header'=>'Dedicated To',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'240px'),
			'value'=>
			function($data)  {
				if($data->PurchaseRequest->dedicated_to == "VESSEL"){
					return "VESSEL: ".$data->PurchaseRequest->Vessel->VesselName;
				}

				if($data->PurchaseRequest->dedicated_to == "VOYAGE"){
					return "VOYAGE: ".VoyageOrderDB::getShortVoyageInfo($data->PurchaseRequest->id_voyage_order);
				}

				return "-";
			}
			,
		),
		*/
		/*
		array(
			'name'=>'RevisionNumber',
			'filter'=>false,
		),
		*/
		//'id_po_category',
		//'amount',
		//'id_metric_pr',
		//'PriceUnit',
		//'id_currency',
		'PO.PONotes',
		//'quantity',


		array(
			'header'=>'Qty',
			//'name'=>'VendorName',
			'value'=>function($data){
						return ReportPO::getQuantity($data);
			},
			'type'=>'raw',
        ),
		//'price_unit',
		array(
			'header'=>'Price',
			//'name'=>'VendorName',
			'value'=>function($data){
						 ReportPO::getPrice($data);
			},
			'type'=>'raw',
        ),
		array(
			'header'=>'Sub Total',
			//'name'=>'VendorName',
			'value'=>function($data){
						return ReportPO::getSubTotal($data);
			},
			'type'=>'raw',
        ),
		array(
			'name'=>'metric',
			'filter'=>false,
        ),
		//'metric',
		array(
			'name'=>'ppn',
			'filter'=>false,
			'value'=>function($data){
				return ReportPO::getPPN($data);
			},
        ),
		//'ppn',
		//'pph15',
		array(
			'name'=>'pph15',
			'filter'=>false,
			'value'=>function($data){
				return ReportPO::getPPH15($data);
			},
        ),
		//'pph23',
		array(
			'name'=>'pph23',
			'filter'=>false,
			'value'=>function($data){
				return ReportPO::getPPH23($data);
			},
        ),
		//'Currency.currency',
		array(
			'header'=>'Currency',
			'filter'=>false,
			'value'=>function($data){
				return ReportPO::getCurrency($data);
			},
        ),
		array(
			'header'=>'Vendor',
			'name'=>'VendorName',
			'value'=>function($data){
					return ReportPO::getVendor($data);
			},
			'type'=>'raw',
        ),
		//'PO.DeliveryDateRangeStart',
		array(
			'header'=>'Delivery Date',
			'name'=>'DeliveryDateRangeStart',
			'value'=>function($data){
				return ReportPO::getDeliveryDate($data);
			},
			 'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,
								'attribute'=>'DeliveryDateRangeStart',
								//'language' => 'id',
								'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
								'htmlOptions' => array(
									'id' => 'datepicker_for_due_date_2',
									'size' => '10',
								),
								'defaultOptions' => array(
									'showOn' => 'focus',
									'dateFormat' => 'yy-mm-dd',
									'showOtherMonths' => true,
									'selectOtherMonths' => true,
									'changeMonth' => true,
									'changeYear' => true,
									'showButtonPanel' => true,
								)
							),
						true),
        ),
		/*
		'PO.POMonth',
		'PO.DeliveryPlace',
		*/
		array(
                'name'=>'POMonth',
                'header'=>'PO Month',
                'type'=>'raw',
                'value'=>function($data){
					if($data->PO){
						return $data->PO->POMonth;
					}else{
						return '-';
					}
				},
        ),
		array(
                'name'=>'DeliveryPlace',
                'header'=>'Delivery Place',
                'type'=>'raw',
                'value'=>function($data){
					if($data->PO){
						return $data->PO->DeliveryPlace;
					}else{
						return '-';
					}
				},
        ),


		/*
		'PONo',
		'POMonth',
		'POYear',
		'RevisionNumber',
		'TermOfPayment',


		'others',
		'dedicated_to',
		'id_vessel',
		'id_voyage_order',

		'DeliveryDateRangeStart',
		'DeliveryDateRangeEnd',
		'is_mutliple_item',
		'SignName',
		'created_user',
		'created_date',
		'ip_user_created',
		'Status',
		*/
),
));


Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date_1').datepicker();
	$('#datepicker_for_due_date_2').datepicker();
}
");

?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,

       //'title'=>'dfsf',

        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ),

        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',


    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,

       //'title'=>'dfsf',

        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ),

        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',


    ),
));
?>
