<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-timesheet-summary-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'timesheet_summary',array('class'=>'span4','maxlength'=>200)); ?>

	<?php echo $form->dropDownlistRow($model,'is_active',array("1"=>"Yes","0"=>"No"),
	array('class'=>'span2','maxlength'=>0)); ?>


	<?php //echo $form->textFieldRow($model,'is_active',array('class'=>'span4')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
