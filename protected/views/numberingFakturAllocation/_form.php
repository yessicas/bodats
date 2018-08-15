<?php

if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'numbering-faktur-allocation-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'is_active',array('1'=>'YES','0'=>'NO', ),
    array('class'=>'span2',
   ));?>


	<?php //echo $form->textFieldRow($model,'allocation_date',array('class'=>'span5','maxlength'=>100)); ?>
	
	<div class="control-group ">
	<?php //echo $form->labelEx($model,'allocation_date'); ?>
	<label class="control-label required" for="allocation_date"><?php echo $model::model()->getAttributeLabel('allocation_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'allocation_date',
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
	<?php echo $form->error($model,'allocation_date'); ?> <!-- error message -->
	</div>
	</div>
	
	
	<?php echo $form->textFieldRow($model,'first_number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'last_number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'prefix_number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'first_number_int',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'last_number_int',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'create_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'user_create',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_create',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
