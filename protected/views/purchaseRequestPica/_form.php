<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'purchase-request-pica-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_purchase_request',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'problem',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'corrective_action',array('rows'=>3, 'cols'=>20, 'class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'PIC',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->dropDownlistRow($model,'status_corrective',array("UNSOLVED"=>"UNSOLVED","SOLVED"=>"SOLVED"),
	array('class'=>'span2','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'status_corrective',array('class'=>'span4','maxlength'=>0)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
