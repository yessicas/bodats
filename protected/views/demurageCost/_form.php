<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'demurage-cost-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

	<label class="control-label required" for="demurageCost_transaction_date"><?php echo $model::model()->getAttributeLabel('transaction_date'); ?> <span class="required">*</span></label> <!-- label -->

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
	
	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span4')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

	

	<?php //echo $form->textFieldRow($model,'is_invoice_created',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'invoice_number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'id_invoice_voyage',array('class'=>'span5','maxlength'=>20)); ?>

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
