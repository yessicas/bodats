<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-invoice-report-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'field_name',array('class'=>'span4','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'field_value',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
