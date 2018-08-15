<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-mst-activity-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'voyage_activity',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'voyage_activity_desc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'id_mst_timesheet_summary',CHtml::listData( MstTimesheetSummary::model()->findAll(), 'id_mst_timesheet_summary', 'timesheet_summary'),
    array('prompt'=>'--Select--','class'=>'span5'));?>
	
	<?php echo $form->dropDownListRow($model,'id_voyage_activity_group',CHtml::listData( VoyageMstActivityGroup::model()->findAll(), 'id_voyage_activity_group', 'voyage_activity_group'),
    array('prompt'=>'--Select--','class'=>'span5'));?>
	
	<div class="control-group ">
	<label class="control-label required" for="color"><?php echo $model::model()->getAttributeLabel('color'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
		<?php $this->widget('application.extensions.SMiniColors.SActiveColorPicker',
		array(
		'model'=>$model,
		'attribute'=>'color',
		'hidden'=>false,
		'htmlOptions'=>array('class'=>'span2'), 
		));
		?>
		<?php echo $form->error($model,'color'); ?>
	
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'color',array('class'=>'span4','maxlength'=>20)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
