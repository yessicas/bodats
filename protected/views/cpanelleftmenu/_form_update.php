<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cpanel-leftmenu-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	
	<?php echo $form->textFieldRow($model,'value_indo',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'value_eng',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'visible',array('1'=>'VISIBLE','0'=>'HIDE'),
	 array('class'=>'span2'));?>

	<?php echo $form->textAreaRow($model,'auth',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
