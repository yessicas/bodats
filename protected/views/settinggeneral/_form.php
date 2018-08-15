<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-general-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'field_name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'field_value',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
