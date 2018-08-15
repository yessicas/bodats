<style>
.typeahead_wrapper { display: block; height: 50px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
.loading-indicator { 
background: white url('images/ajax-loader.gif') right center no-repeat; 
}

</style>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl("purchaseorder/createpomultiplepr/"),
    'type' => 'horizontal',
    'method'=>'post',
)); ?>

<?php 
if(!$is_single) {
	$TITLE = 'Create PO - Multiple PR';
}else{
	$TITLE = 'Create PO From Single PR';
}
?>

<?php
	PurchaseDisplayer::displayTabLabelPOFromPR($this,3, $TITLE,"purchaseorder/createpomultiplepr");
?>

<div id="content">
<h2><?php echo $TITLE; ?></h2>
<hr>
</div>

<?php 
if(!$is_single) {
	echo '
	<div class="alert alert-info">
	You are creating PO from multiple PR. You can change quantity of PO due to some acceptable reasons. 
	</div>
	';
}
?>

<?php echo $form->errorSummary($modelpo); ?>

<div class="view">
<h4 style="color:#BD362F;"> PO Item & Quantity </h4>
<table class="items table table-striped table-bordered table-condensed">
	<thead>
		<tr>
		<th rowspan="2">No</th>
		<th colspan="4">Purchase Request</th>
		<th colspan="5">Purchase Order</th>
		</tr>
		<tr>
		<th>PR. Number</th>
		<th>PR. Category</th>
		<th width="180px">Item</th>
		<th width="70px">PR Quantity</th>
		
		<th width="150px">PO Quantity</th>
		<th width="180px">Price Unit</th>
		<th width="40px">PPN (%)</th>
		<th width="100px">Notes</th>
		</tr>
	</thead>
	<tbody>
	
<?php
	function displayRowTextInput($idpr, $idprdet, $id_item, $qty, $metric_qty, $price=0, $ppn=0, $currency="IDR", $notes=""){
		$SECOND_PART = '
			<td>'.CHtml::textField('item['.$idpr.']['.$id_item.'][qty]',$qty,array('class'=>'span5','maxlength'=>6)).'
			'.CHtml::dropDownList( 'item['.$idpr.']['.$id_item.'][metric]', $metric_qty ,CHtml::listData(MstMetricPr::model()->findAll(array('order'=>'metric_name ASC')), 'metric', 'metric_name'),
			array('class'=>'span7')).'
			</td>
			<td>'.CHtml::textField('item['.$idpr.']['.$id_item.'][price]',$price,array('class'=>'span8','maxlength'=>12)).'
			'.CHtml::dropDownList( 'item['.$idpr.']['.$id_item.'][currency]', $currency ,CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
			array('class'=>'span4')).'
			</td>
			<td>'.CHtml::textField('item['.$idpr.']['.$id_item.'][ppn]',$ppn,array('class'=>'span12','maxlength'=>3)).'</td>
			<td>'.CHtml::textField('item['.$idpr.']['.$id_item.'][notes]',$notes,array('class'=>'span12','maxlength'=>32)).'</td>
			'.CHtml::hiddenField('item['.$idpr.']['.$id_item.'][idprdet]',$idprdet,array('class'=>'span12','maxlength'=>32)).'
		';
			
		return $SECOND_PART;
	}
?>

<?php
	//GET PO Model
	foreach($cid as $idpr=>$val){
		$modelpo = PurchaseOrderDB::getPurchaseOrder($idpr);
		break;
	}
	
	if($modelpo->isNewRecord){
		$modelpo->discount =0;
		$modelpo->ppn =0;
		$modelpo->pbbkb =0;
		$modelpo->PONotes ="-";
	}
?>

<?php
	$no=0;
	foreach($cid as $idpr=>$val){
		$no++;
		//echo $idpr.'<br>';
		$model = PurchaseRequest::model()->findByAttributes(array('id_purchase_request'=>$idpr));

		echo Chtml::hiddenField('cid['.$idpr.']', $val,array('value'=>$val,'readonly'=>'readonly')); ;
		$SECOND_PART = '';
		if($model->is_mutliple_item == 0){
			$dedicated_info = PurchaseRequestDB::getDedicatedTo($model);
			$SECOND_PART .= '
			<td>'.$model->PoCategory->category_name.' '.$dedicated_info.'</td>
			<td>'.$model->amount.' '.$model->metric.'</td>
			';
			
			$id_item = 0;
			$SECOND_PART .= displayRowTextInput($idpr, 0, $id_item, $model->amount, $model->metric, 0, 0, "IDR", "");
			
			$SECOND_PART .= '
			</tr>
			';
		}
		
		$detailsNumber = 0;
		if($model->is_mutliple_item == 1){
			$details = PurchaseRequestDetail::model()->findAllByAttributes(array('id_purchase_request'=>$model->id_purchase_request));
			foreach($details as $detail){
				$detailsNumber++;
				//$RES .= $no."). ".PurchaseRequestDB::getItemDetailPR($detail)." - ".$detail->quantity." ".$detail->metric."\r\n";
				$dedicated_info = PurchaseRequestDB::getDedicatedTo($detail);
				$SECOND_PART .= '
					<td>'.PurchaseRequestDB::getItemDetailPR($detail).' '.$dedicated_info.'</td>
					<td>'.$detail->quantity." ".$detail->metric.'</td>
				';
				$id_item = $detail->id_item;
				
				$SECOND_PART .= displayRowTextInput($idpr, $detail->id_purchase_request_detail, $id_item, $detail->quantity, $detail->metric, 0, 0, "IDR", "");
		
				$SECOND_PART .= '
				</tr>
				';
			}
		}
		
		$rowspan ="";
		if($detailsNumber > 0){
			$rowspan = ' rowspan="'.$detailsNumber.'"';
		}
		
		$dedicated_info = PurchaseRequestDB::getDedicatedTo($model);
		echo '
		<tr>
		<td '.$rowspan.'>'.$no.'. </td>
		<td '.$rowspan.'>'.$model->PRNumber.' '.$dedicated_info.'</td>
		<td '.$rowspan.'>'.$model->PoCategory->category_name.'</td>';
		
		echo $SECOND_PART;
		
	}
?>
	<tr>
		<td colspan="7" style="text-align:right;">Discount</td>
		<td><?php echo $form->textField($modelpo,'discount',array('class'=>'span12','maxlength'=>5)); ?></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="7" style="text-align:right;">PPN</td>
		<td><?php echo $form->textField($modelpo,'ppn',array('class'=>'span12','maxlength'=>4)); ?></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="7" style="text-align:right;">PBBKB</td>
		<td><?php echo $form->textField($modelpo,'pbbkb',array('class'=>'span12','maxlength'=>4)); ?></td>
		<td></td>
	</tr>
	
	<tr>
		<td colspan="9"><?php echo $form->textFieldRow($modelpo,'PONotes',array('class'=>'span10')); ?></td>
	</tr>
	
	</tbody>
</table>
</div>

<div class="view">
	<h4 style="color:#BD362F;"> PO Info </h4>

	<?php 
	if($modelpo->isNewRecord){
		//$dataformatnumber=NumberingDocumentDBPurchaseOrder::getFormatNumber($modelpo,'id_purchase_order','PONo','POMonth','POYear');

		//echo $form->textFieldRow($modelpo,'PONumber',array('class'=>'span5','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($modelpo,'PONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($modelpo,'POMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchaseOrder::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($modelpo,'POYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchaseOrder::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($modelpo,'PONumber',array('class'=>'span5','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>



	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $modelpo::model()->getAttributeLabel('PODate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$modelpo,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'PODate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>date("Y-m-d")),
	)); ?>	
	<?php echo $form->error($modelpo,'PODate'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textFieldRow($modelpo,'RevisionNumber',array('class'=>'span1', 'maxLength'=>3,'value'=>0)); ?>
	
	<?php 
	$modelpo->id_po_category = $model->id_po_category;
	echo $form->dropDownListRow($modelpo,'id_po_category',CHtml::listData(PoCategory::model()->findAll(array(
           //'condition' => 'id_parent = :id_parent',
           //'params' => array(
           //    ':id_parent' => "10400",
           //),
       )), 'id_po_category', 'category_name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5')); ?>
</div>
	
	
	


	
	
	
<div class="view">
	<h4 style="color:#BD362F;"> Vendors </h4>

	<?php /* // ambil dari vendor category
	$criteria=new CDbCriteria;
	//$criteria->condition = 'id_po_category = :id_po_category ';
	//$criteria->params = array(':id_po_category'=>$modelpr->id_po_category);
	//$criteria->with=array('Vendor');
    //$criteria->together=true;

    $listdatavendorbypocategory=CHtml::listData(VendorCategory::model()->findAll($criteria),'id_vendor',function($vendor) {
			    return CHtml::encode($vendor->Vendor->VendorName);
					});
	?>
	<?php echo $form->dropDownListRow($modelpo,'id_vendor',$listdatavendorbypocategory,
    array('class'=>'span5','prompt'=>Yii::t('strings','-- Select --'),
     'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('purchaseorder/findotherdatavendors'),'success'=>'findvendor'))); */?>


     <?php 
	if(!$modelpo->isNewRecord){
		$value=isset($_POST['PurchaseOrder']['VendorName']) ?$_POST['PurchaseOrder']['VendorName'] : $modelpo->Vendor->VendorName;
		$valueaddr=isset($_POST['addressvendor']) ?$_POST['addressvendor'] : $modelpo->Vendor->Address;
		$valuecontact=isset($_POST['contactvendor']) ?$_POST['contactvendor'] : $modelpo->Vendor->ContactName;
	}
	else{
		$value=isset($_POST['PurchaseOrder']['VendorName']) ?$_POST['PurchaseOrder']['VendorName'] : '';
		$valueaddr=isset($_POST['addressvendor']) ? $_POST['addressvendor'] : '';
		$valuecontact=isset($_POST['contactvendor']) ? $_POST['contactvendor'] : '';
	}
	?>


     <div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="Quotation_customername"><?php echo $model::model()->getAttributeLabel('VendorName'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $modelpo,  // INSTANCE OF MODEL 'User'
                'attribute' => 'VendorName', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('purchaseorder/autovendor')."';
						 	

						 	 	$(document.activeElement).addClass('loading-indicator');
							  // ambil JSON ke server
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								  $(document.activeElement).removeClass('loading-indicator');
								 });
														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									 + '<div class=\'typeahead_secondary\'>' + listdata[item].alamat + '</div>'
									 + '<div class=\'typeahead_secondary\'>' + listdata[item].contact + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#PurchaseOrder_id_vendor').val(listdata[item].id); 
						$('#addressvendor').val(listdata[item].alamat); 
						$('#contactvendor').val(listdata[item].contact);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($modelpo,'VendorName'); ?>
		</div>
		</div>

	<?php echo $form->hiddenField($modelpo,'id_vendor',array('class'=>'span3','maxlength'=>20)); ?> 

    <div class="control-group ">
	<label class="control-label required" for="Quotation_addressvendor"><?php echo $modelpo::model()->getAttributeLabel('Vendor Address'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php echo Chtml::textArea('addressvendor',$valueaddr,array('rows'=>3, 'cols'=>100,'class'=>'span5','readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="control-group ">
	<label class="control-label required" for="Quotation_addressvendor"><?php echo $modelpo::model()->getAttributeLabel('Vendor Contact'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php echo Chtml::textField('contactvendor',$valuecontact,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>
	
	<?php //echo $form->textFieldRow($modelpo,'SignName',array('class'=>'span5','maxlength'=>200)); ?>
	
	<?php echo $form->textFieldRow($modelpo,'up',array('class'=>'span5','maxlength'=>200)); ?>
	
</div>





<div class="view">
	<h4 style="color:#BD362F;"> Delivery Date & Place </h4>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $modelpo::model()->getAttributeLabel('DeliveryDateRangeStart'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$modelpo,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DeliveryDateRangeStart',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>date("Y-m-d")),
	)); ?>	
	<?php echo $form->error($modelpo,'DeliveryDateRangeStart'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($modelpo,'DeliveryDateRangeEnd',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $modelpo::model()->getAttributeLabel('DeliveryDateRangeEnd'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$modelpo,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DeliveryDateRangeEnd',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>date("Y-m-d")),
	)); ?>	
	<?php echo $form->error($modelpo,'DeliveryDateRangeEnd'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textFieldRow($modelpo,'DeliveryPlace',array( 'class'=>'span5','maxlength'=>250)); ?>

</div>




<div class="view">
	<h4 style="color:#BD362F;"> Sign name</h4>
	<?php echo $form->textFieldRow($modelpo,'SignName',array('class'=>'span5','maxlength'=>200)); ?>
</div>


<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType' => 'submit',
		'type'=>'primary',
		'label'=>'Create PO',
	)); ?>
</div>
<?php $this->endWidget(); ?>