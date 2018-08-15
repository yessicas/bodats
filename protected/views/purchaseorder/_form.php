<script>

		function findvendor(data) {
             
                var json = JSON.parse(data);
               $('#addressvendor').val(json["addressvendor"]);
               $('#contactvendor').val(json["contactvendor"]);


				
        }
</script>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-order-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="view">
	<h4 style="color:#BD362F;"> PO Info </h4>

	<?php //echo $form->textFieldRow($model,'id_purchase_request',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'PONumber',array('class'=>'span5','maxlength'=>250)); ?>


	<?php 
	if($model->isNewRecord){
		//$dataformatnumber=NumberingDocumentDBPurchaseOrder::getFormatNumber($model,'id_purchase_order','PONo','POMonth','POYear');

		//echo $form->textFieldRow($model,'PONumber',array('class'=>'span5','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'PONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'POMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchaseOrder::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'POYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBPurchaseOrder::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($model,'PONumber',array('class'=>'span5','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>



	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('PODate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
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
	<?php echo $form->error($model,'PODate'); ?> <!-- error message -->
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('id_vessel'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->hiddenField($model,'id_vessel',array('class'=>'span5','value'=>$modelpr->id_vessel)); ?>

	<?php echo Chtml::dropDownList('vessel',$modelpr->id_vessel,CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5','disabled'=>'disabled')); ?>
	</div>
	</div>


	<?php /*
	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5','options' => array($modelpr->id_vessel=>array("selected"=>true)))); ?>
	*/ ?>

	<?php echo $form->textFieldRow($model,'RevisionNumber',array('class'=>'span3','value'=>0)); ?>

	<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span3','value'=>$modelpr->dedicated_to,'readonly'=>'readonly')); ?>

	</div>






	<div class="view">
	<h4 style="color:#BD362F;"> Vendors And Price </h4>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('id_po_category'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo $form->hiddenField($model,'id_po_category',array('class'=>'span5','value'=>$modelpr->id_po_category)); ?>

	<?php echo Chtml::dropDownList('POcategory',$modelpr->id_po_category,CHtml::listData(PoCategory::model()->findAll(array(
           'condition' => 'id_parent = :id_parent',
           'params' => array(
               ':id_parent' => "10400",
           ),
       )), 'id_po_category', 'category_name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5' ,'disabled'=>'disabled')); ?>

    </div>
	</div>

	<?php /*

	<?php echo $form->dropDownListRow($model,'id_po_category',CHtml::listData(PoCategory::model()->findAll(array(
           'condition' => 'id_parent = :id_parent',
           'params' => array(
               ':id_parent' => "10400",
           ),
       )), 'id_po_category', 'category_name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5','options' => array($modelpr->id_po_category=>array("selected"=>true)))); ?>
	
	*/ ?>


	<?php //echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>





	<?php // ambil dari vendor category
	$criteria=new CDbCriteria;
	$criteria->condition = 'id_po_category = :id_po_category ';
	$criteria->params = array(':id_po_category'=>$modelpr->id_po_category);
	$criteria->with=array('Vendor');
    $criteria->together=true;

    $listdatavendorbypocategory=CHtml::listData(VendorCategory::model()->findAll($criteria),'id_vendor',function($vendor) {
			    return CHtml::encode($vendor->Vendor->VendorName);
					});
	?>
	<?php echo $form->dropDownListRow($model,'id_vendor',$listdatavendorbypocategory,
    array('class'=>'span5','prompt'=>Yii::t('strings','-- Select --'),
     'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('purchaseorder/findotherdatavendors'),'success'=>'findvendor')));?>


    <?php 
	if(!$model->isNewRecord){
		$valueaddr=isset($_POST['addressvendor']) ?$_POST['addressvendor'] : $model->Vendor->Address;
		$valuecontact=isset($_POST['contactvendor']) ?$_POST['contactvendor'] : $model->Vendor->ContactName;
	}
	else{
		$valueaddr=isset($_POST['addressvendor']) ? $_POST['addressvendor'] : '';
		$valuecontact=isset($_POST['contactvendor']) ? $_POST['contactvendor'] : '';
	}
	?>

    <div class="control-group ">
	<label class="control-label required" for="Quotation_addressvendor"><?php echo $model::model()->getAttributeLabel('Vendor Address'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php echo Chtml::textArea('addressvendor',$valueaddr,array('rows'=>3, 'cols'=>100,'class'=>'span5','readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="control-group ">
	<label class="control-label required" for="Quotation_addressvendor"><?php echo $model::model()->getAttributeLabel('Vendor Contact'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php echo Chtml::textField('contactvendor',$valuecontact,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>






    <?php echo $form->textFieldRow($model,'up',array('class'=>'span5','maxlength'=>200)); ?>

    <?php /*
    <div class="control-group ">

	<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php echo $form->textField($model,'amount',array('class'=>'span3','maxlength'=>20,'value'=>$modelpr->amount)); ?>

	<?php echo $form->dropDownList($model,'metric',CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),
    array('class'=>'span2','options' => array($modelpr->metric=>array("selected"=>true))));?>
	<?php echo $form->error($model,'amount'); ?> <!-- error message -->
	</div>
	</div>

    

	


	<div class="control-group ">

	<label class="control-label required" for="Quotation_TotalQuantity"><?php echo $model::model()->getAttributeLabel('PriceUnit'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	 <?php echo $form->textField($model,'PriceUnit',array('class'=>'span3')); ?>

	 <?php echo $form->dropDownList($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('class'=>'span2'));?>

	<?php echo $form->error($model,'PriceUnit'); ?> <!-- error message -->
	</div>
	</div>

	*/ ?>
    
	<?php echo $form->textAreaRow($model,'notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8','value'=>$modelpr->notes)); ?>


	</div>
	
	
	<div class="view">
	<h4 style="color:#BD362F;"> Tax Info </h4>


	<?php echo $form->textFieldRow($model,'ppn',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pph15',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pph23',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'others',array('class'=>'span5')); ?>


	</div>

	<div class="view">
	<h4 style="color:#BD362F;"> Delivery Date & Place </h4>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('DeliveryDateRangeStart'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
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
	<?php echo $form->error($model,'DeliveryDateRangeStart'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'DeliveryDateRangeEnd',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('DeliveryDateRangeEnd'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
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
	<?php echo $form->error($model,'DeliveryDateRangeEnd'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textAreaRow($model,'DeliveryPlace',array('rows'=>6, 'cols'=>50, 'class'=>'span8','maxlength'=>250)); ?>

	</div>


	<div class="view">
	<h4 style="color:#BD362F;"> Sign name And Notes  </h4>

	<?php echo $form->textFieldRow($model,'SignName',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'PONotes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


	</div>


	<?php //echo $form->textFieldRow($model,'PODate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'PONo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'POMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'POYear',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TermOfPayment',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'amount',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_metric_pr',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'DeliveryDateRangeStart',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldRow($model,'is_mutliple_item',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_created',array('class'=>'span5','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
