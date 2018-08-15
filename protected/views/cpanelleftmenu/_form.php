<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cpanel-leftmenu-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_leftmenu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_parent_leftmenu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'has_child',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'menu_name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'menu_icon',array('class'=>'span5','maxlength'=>100)); ?>

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
