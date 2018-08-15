<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vessel-document-info-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->dropDownListRow($model,'id_vessel_document',CHtml::listData(MstVesselDocument::model()->findAll(), 'id_vessel_document', 'VesselDocumentName'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel_document',array('class'=>'span5')); ?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FindingReportDetail_DateCreated"><?php echo $model::model()->getAttributeLabel('DateCreated'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DateCreated',
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
	<?php echo $form->error($model,'DateCreated'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'DateCreated',array('class'=>'span5')); ?>


	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FindingReportDetail_ValidUntil"><?php echo $model::model()->getAttributeLabel('ValidUntil'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'ValidUntil',
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
	<?php echo $form->error($model,'ValidUntil'); ?> <!-- error message -->
	</div>
	</div>

	<?php echo $form->dropDownlistRow($model,'IsPermanen',array("1"=>"Yes","0"=>"No"),
	array('class'=>'span2','maxlength'=>0)); ?>

	<?php echo $form->textAreaRow($model,'PlaceCreated',array('rows'=>4, 'cols'=>40, 'class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'ValidUntil',array('class'=>'span5')); ?>

	
	<?php echo $form->fileFieldRow($model,'Attachment',array('style'=>'width:190px','margin-left:-75px','maxlength'=>250)); ?>
	
	

	<?php //echo $form->textFieldRow($model,'Check1',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Check2',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Check3',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Check4',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Check5',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'Check6',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php // echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
