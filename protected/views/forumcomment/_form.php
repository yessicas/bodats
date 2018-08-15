<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'forum-comment-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_forum_topic',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'comment',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'update_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ip_address',array('class'=>'span5','maxlength'=>64)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
