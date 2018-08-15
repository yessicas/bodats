<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'schedule-actual-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'VesselTugId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VesselBargeId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_voyage_activity_group',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'schedule_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'schedule_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sch_month',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sch_year',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
