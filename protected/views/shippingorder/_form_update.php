<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'shipping-order-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php 
	if($model->isNewRecord){
		$dataformatnumber=NumberingDocumentDB::getFormatNumber($model,'id_shipping_order','SONo','SOMonth','SOYear');

		echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'SONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'SOMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getMonthNow(),'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'SOYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDB::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>


	<?php //echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

	<?php 
	$modelquotation=Quotation::model()->findByPk($model->id_quotation);
	$valuequotationo=isset($_POST['quotationo']) ?$_POST['quotationo'] : $modelquotation->QuotationNumber;
	$valuecostumer=isset($_POST['costumer']) ?$_POST['costumer'] : $modelquotation->Customer->ContactName;
	$valuecostumeraddress=isset($_POST['costumeraddress']) ?$_POST['costumeraddress'] : $modelquotation->Customer->Address;
	?>
	<!--- quotation -->
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('id_quotation'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('quotationo',$valuequotationo,array('class'=>'span4','readonly'=>'readonly')); 
        echo' ';
        echo Chtml::ajaxLink('<i class="icon-search"></i> Search',Yii::app()->createUrl('quotation/showopenquotation'),
                            array('update'=>'#namafield'),array("id"=>'pilih','class'=>''));
    ?>

    <?php echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->error($model,'id_quotation'); ?> <!-- error message -->
	</div>
	</div>
	<!--- end quotation -->

	<!--- cutomer -->
	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('costumer',$valuecostumer,array('class'=>'span4','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer Address'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textArea('costumeraddress',$valuecostumeraddress,array('class'=>'span4','readonly'=>'readonly','rows'=>6, 'cols'=>50,)); 
    ?>

	</div>
	</div>

	<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>
	
	<!--- end cutomer -->

	<?php //echo $form->textFieldRow($model,'SI_Number',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'EstUnloading',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('EstUnloading'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'EstUnloading',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'EstUnloading'); ?> <!-- error message -->
	</div>
	</div>


	<?php //echo $form->textFieldRow($model,'id_mothervessel',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_mothervessel',CHtml::listData(Mothervessel::model()->findAll(), 'id_mothervessel', 'MV_Name'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>

	<?php echo $form->textFieldRow($model,'Period',array('class'=>'span5','append' => 'Day (s)')); ?>

	<?php echo $form->textFieldRow($model,'SO_Date',array('class'=>'span2','value'=>date("Y-m-d"),'readonly'=>'readonly')); ?>
	<?php /*
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('SO_Date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'SO_Date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'SO_Date'); ?> <!-- error message -->
	</div>
	</div>
	*/
	?>


	<?php echo $form->textAreaRow($model,'SO_Place',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'SO_Attachment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php // echo $form->textFieldRow($model,'TrVoyageOrderRevisionId',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'SO_Status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textAreaRow($model,'RevisionNote',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php // echo $form->textFieldRow($model,'total_price',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'total_capacity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'total_barge_size',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save & Continue' : 'Save & Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div class="view">

 <div id="namafield" style="visibility: hidden;"></div>