
<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-close-document-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php //echo $form->errorSummary($model); ?>
	
	<?php echo $form->hiddenField($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20,'value'=>$_GET['id_voyage_order'])); ?>

	<?php echo $form->hiddenField($model,'IdVoyageDocument',array('class'=>'span5','value'=>$_GET['IdVoyageDocument'])); ?>

	<?php //echo $form->textFieldRow($model,'VoyageDocumentName',array('class'=>'span5','maxlength'=>240)); ?>
	<?php echo $form->fileFieldRow($model,'VoyageDocumentName',array('style'=>'width:200px','maxlength'=>240)); ?>

	<?php //echo $form->textFieldRow($model,'uploaded_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'uploaded_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_uploaded',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>