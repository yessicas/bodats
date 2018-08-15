<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-mst-activity-group-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'voyage_activity_group_short',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'voyage_activity_group',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'voyage_activity_group_desc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>20)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
