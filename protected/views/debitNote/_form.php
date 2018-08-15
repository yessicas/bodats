<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'debit-note-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span4','maxlength'=>20)); ?>

	<label class="control-label required" for="debitNote_transaction_date"><?php echo $model::model()->getAttributeLabel('transaction_date'); ?> <span class="required">*</span></label> <!-- label -->

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'transaction_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'transaction_date'); ?>

	<?php //echo $form->textFieldRow($model,'transaction_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_debit_note_category',array('class'=>'span4')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php echo $form->dropDownListRow($model,'omitted_status',array('NONE'=>'NONE', 'PROCCED'=>'PROCCED', 'OMIT'=>'OMIT'),array('prompt'=>'--Select--','class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'omitted_status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
