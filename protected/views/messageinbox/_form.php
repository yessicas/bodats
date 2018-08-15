<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'message-inbox-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'to_inbox',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'from_inbox',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
