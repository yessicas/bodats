<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bank-account-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'Currency',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency_type'),
    array('class'=>'span2'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
