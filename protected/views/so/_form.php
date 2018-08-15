<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'so-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php 
	if($model->isNewRecord){
		//$dataformatnumber=NumberingDocumentDBSO::getFormatNumber($model,'id_so','SONo','SOMonth','SOYear');

		//echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SOMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSO::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SOYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSO::getYearNow(),'readonly'=>'readonly')); 
	
		echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20,'value'=>$_GET['idquo'])); 
		echo $form->hiddenField($model,'id_sales_plan',array('class'=>'span5','maxlength'=>20,'value'=>$_GET['idsp'])); 


	}else {
		echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('SODate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'SODate',
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
	<?php echo $form->error($model,'SODate'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->textFieldRow($model,'SI_Number',array('class'=>'span5','maxlength'=>200)); ?>

	<?php 
	if($modelquo->id_bussiness_type_order==100){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}


	if($modelquo->id_bussiness_type_order==200){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}


	if($modelquo->id_bussiness_type_order==250){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_TRANS', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}

	if($modelquo->id_bussiness_type_order==300){
	echo $this->renderPartial('../quotation/view_partialTC', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	}

	?>

	<?php //echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

	<!--  -->

	<?php //echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SOQuartal',array('class'=>'span5')); ?>

	<!--  -->

	<?php echo $form->textFieldRow($model,'Consignee',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'NotifyAddress',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'Marks',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'DocumentsRequired',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->fileFieldRow($model,'SI_Attachment',array('style'=>'width:200px','maxlength'=>100)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>
