<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'numbering-faktur-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

<div class="view">

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'prefix_number',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'last_number',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>

<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('taken_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'taken_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'taken_date'); ?> <!-- error message -->
	</div>
	</div>
	
	<?php //echo $form->textFieldRow($model,'taken_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'user_taken',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_taken',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
