<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'numbering-invoice-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>
<div class="alert alert-info">This feature is a feature to determine initial number only (seed).</div>
<div class="view">
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'number_invoice',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'is_initial',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_invoice_voyage',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'taken_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'user_taken',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_taken',array('class'=>'span5','maxlength'=>50)); ?>
</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
