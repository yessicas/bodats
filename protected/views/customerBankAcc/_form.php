<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-bank-acc-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php $cus=$_GET['id']; ?>

	<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span4', 'value'=>$cus,'maxlength'=>20,'readonly'=>'readonly')); ?>

	<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span4','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency_type'),
    array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span4')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
