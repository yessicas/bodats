<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mothervessel-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'MotherVesselCode',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'MV_Name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'MV_Type',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'MV_Route',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
