<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'warehouse-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'warehouse_name',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'address',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownlistRow($model,'is_active',array("1"=>"Yes","0"=>"No"),
	array('class'=>'span2','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
