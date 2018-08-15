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
    //'action'=>Yii::app()->createUrl("purchaseorder/createpomultiplepr/"),
    'type' => 'horizontal',
    'method'=>'post',
)); ?>

<?php
	$TITLE = 'Update PO';
	PurchaseDisplayer::displayTabLabelPOFromPR($this,3, $TITLE,"purchaseorder/updatepo/id/".$id);
?>

<div id="content">
<h2>Update Purchase Order</h2>
<hr>
</div>

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
		<?php
			if($modelpo->is_mutliple_item == 1){
				echo '<th>Delete</th>';
			}
		?>
		</tr>
	</thead>
	<tbody>
	
<?php
	function displayRowTextInput($idpo, $idpodet, $id_item, $qty, $metric_qty, $price=0, $ppn=10, $currency="IDR", $notes=""){
		$SECOND_PART = '
			<td>'.CHtml::textField('item['.$idpodet.'][qty]',$qty,array('class'=>'span5','maxlength'=>6)).'
			'.CHtml::dropDownList( 'item['.$idpodet.'][metric]', $metric_qty ,CHtml::listData(MstMetricPr::model()->findAll(array('order'=>'metric_name ASC')), 'metric', 'metric_name'),
			array('class'=>'span7')).'
			</td>
			<td>'.CHtml::textField('item['.$idpodet.'][price]',$price,array('class'=>'span8','maxlength'=>12)).'
			'.CHtml::dropDownList( 'item['.$idpodet.'][currency]', $currency ,CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
			array('class'=>'span4')).'
			</td>
			<td>'.CHtml::textField('item['.$idpodet.'][ppn]',$ppn,array('class'=>'span12','maxlength'=>3)).'</td>
			<td>'.CHtml::textField('item['.$idpodet.'][notes]',$notes,array('class'=>'span12','maxlength'=>32)).'</td>
			'.CHtml::hiddenField('item['.$idpodet.'][idpodet]',$idpodet,array('class'=>'span12','maxlength'=>32)).'
		';
			
		return $SECOND_PART;
	}
?>


<?php
	$no=0;
	$modeldetails = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$modelpo->id_purchase_order));
	foreach($modeldetails as $modeldetail){
		$no++;
		$SECOND_PART = '';

		$detailsNumber = 0;		
		$rowspan ="";
		if($detailsNumber > 0){
			$rowspan = ' rowspan="'.$detailsNumber.'"';
		}
		
		//Ini fungsi diadakan agar ketika mekanisme lama belum tersupport otomatis akan dideteksi sebagai multiple item.
		if(!isset($modelpo->PurchaseRequest)){
			$modelpo->is_mutliple_item = 1;
			$modelpo->save();
		}
		
		//Jika Single Item
		if($modelpo->is_mutliple_item == 0){
			$dedicated_info = PurchaseRequestDB::getDedicatedTo($modelpo->PurchaseRequest);
			$dedicated_info = '';
			echo '
			<tr>
			<td '.$rowspan.'>'.$no.'. </td>
			<td '.$rowspan.'>'.$modelpo->PurchaseRequest->PRNumber.' '.$dedicated_info.'</td>
			<td '.$rowspan.'>'.$modelpo->PurchaseRequest->PoCategory->category_name.'</td>';
			
						$dedicated_info = PurchaseRequestDB::getDedicatedTo($modelpo->PurchaseRequest);
			$SECOND_PART .= '
			<td>'.$modelpo->PurchaseRequest->PoCategory->category_name.' '.$dedicated_info.'</td>
			<td>'.$modelpo->PurchaseRequest->amount.' '.$modelpo->PurchaseRequest->metric.'</td>
			';
			
			$id_item = 0;
			$SECOND_PART .= displayRowTextInput($modelpo->id_purchase_order, $modeldetail->id_purchase_order_detail, $modeldetail->id_item,
			$modeldetail->quantity, $modeldetail->metric, $modeldetail->price_unit, $modeldetail->ppn, $modeldetail->id_currency, $modeldetail->notes);
			
			$SECOND_PART .= '
			</tr>
			';
			echo $SECOND_PART;
		}
		
		//Jika Multiple Item
		if($modelpo->is_mutliple_item == 1){
			$dedicated_info = PurchaseRequestDB::getDedicatedTo($modeldetail->PurchaseRequestDetail->PurchaseRequest);
			
			echo '
			<tr>
			<td '.$rowspan.'>'.$no.'. </td>
			<td '.$rowspan.'>'.$modeldetail->PurchaseRequestDetail->PurchaseRequest->PRNumber.' '.$dedicated_info.'</td>
			<td '.$rowspan.'>'.$modeldetail->PurchaseRequestDetail->PurchaseRequest->PoCategory->category_name.'</td>';
			
			$detailsNumber++;

			$SECOND_PART .= '
				<td>'.PurchaseRequestDB::getItemDetailPR($modeldetail).' '.$dedicated_info.'</td>
				<td>'.$modeldetail->quantity." ".$modeldetail->metric.'</td>
			';
			$id_item = $modeldetail->id_item;
			
			$SECOND_PART .= displayRowTextInput($modelpo->id_purchase_order, $modeldetail->id_purchase_order_detail, $modeldetail->id_item, $modeldetail->quantity, $modeldetail->metric, $modeldetail->price_unit, $modeldetail->ppn, $modeldetail->id_currency, $modeldetail->notes);
	
			$deletelink = CHtml::link("","#",array("submit"=>array("purchaseorder/deleteitempo",
				"idpo"=>$modelpo->id_purchase_order,
				"iddet"=>$modeldetail->id_purchase_order_detail,
				),
				"confirm"=>"Are you sure to remove this item?", "class"=>"icon-trash"));
			//<a href=""><i id="delitem" class="icon-trash"></i></a>
			$SECOND_PART .= '
			<td>'.$deletelink.'</td>
			</tr>
			';
			echo $SECOND_PART;
		}
		
	}
?>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('body').on('select','#delitem',function(){
	//alert('ok');
		var text = "<?php echo Yii::t('strings','Are you sure approve this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab){
			return true;
		}else{
			return false;
		}
	
});
</script>
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
	),
	)); ?>	
	<?php echo $form->error($modelpo,'PODate'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textFieldRow($modelpo,'RevisionNumber',array('class'=>'span1', 'maxLength'=>3,'value'=>0)); ?>
	
	<?php 
	if($modelpo->is_mutliple_item == 0){
		$modelpo->id_po_category = $modelpo->PurchaseRequest->id_po_category;
	}
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
	<label class="control-label required" for="Quotation_customername"><?php echo $modelpo::model()->getAttributeLabel('VendorName'); ?> <span class="required">*</span></label> <!-- label manual -->
	
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
	),
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
	),
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
		'label'=>'Save PO',
	)); ?>
</div>
<?php $this->endWidget(); ?>