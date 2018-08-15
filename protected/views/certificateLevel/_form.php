<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'certificate-level-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'certiface_level',array('class'=>'span3','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'keterangan',array('rows'=>5, 'cols'=>40, 'class'=>'span4')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
