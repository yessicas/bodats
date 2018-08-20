<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'schedule-plan-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'schedule_date',array('class'=>'span5', 'readonly'=>'readonly')); ?>

	<?php //echo $form->textFieldRow($model,'VesselTugId',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'VesselBargeId',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_activity_group',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'id_voyage_activity_group',CHtml::listData( VoyageMstActivityGroup::model()->findAll(), 'id_voyage_activity_group', 'voyage_activity_group'),
    array('prompt'=>'--Select--','class'=>'span3'));?>

    <?php echo $form->dropDownListRow($model,'id_mst_template',CHtml::listData( MasterTemplate::model()->findAll(), 'id_mst_template', 'name_mst_template'),
    array('prompt'=>'--Select--','class'=>'span3'));?>


	<?php /*
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('schedule_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
			'model' => $model, // Your model
			'language'=>'id',
			'attribute' => 'schedule_date', // Attribute for input
			'options' => array(
					'showOn'=>'focus',
					'dateFormat'=>'yy-mm-dd',
					),
			'htmlOptions' => array(
					'style'=>'width:150px;', // styles to be applied
					'size' => '10',    // textField maxlength
					//'onBlur' => 'javascript:cekDate()',
			),
			)); ?>
	<?php echo $form->error($model,'schedule_date'); ?> <!-- error message -->
	</div>
	</div>
	*/ ?>

	<?php //echo $form->textFieldRow($model,'schedule_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'duration',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'duration',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldRow($model,'sch_month',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'sch_year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
