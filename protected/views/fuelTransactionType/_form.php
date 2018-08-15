<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fuel-transaction-type-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_fuel_transaction_type',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'fuel_transaction_type',array('class'=>'span3','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'category',array('+'=>'+','-'=>'-'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
