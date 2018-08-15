<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-request-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_purchase_request',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'purchase_item_table',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'id_item',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_metric_pr',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'requested_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'requested_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ip_user_requested',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'approved_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'approval_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ip_user_approved',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
