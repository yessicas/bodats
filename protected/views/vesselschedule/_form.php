<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vessel-schedule-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'day',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'month',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel_status',CHtml::listData(VesselStatus::model()->findAll(), 'id_vessel_status', 'vessel_status'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_shipping_order_detail',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
