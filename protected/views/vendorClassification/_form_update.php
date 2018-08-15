<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vendor-classification-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>

	<?php echo $form->HiddenField($model,'id_vendor',array('class'=>'span4','maxlength'=>20,'readonly'=>'readonly')); ?>

<?php echo $form->dropDownlistRow($model,'type',array("AGENCY"=>"AGENCY","PRODUCT"=>"PRODUCT",),
	array('class'=>'span2','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
