<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'standard-agency-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'JettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>


	<?php //echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>


	<?php echo $form->textFieldRow($model,'agency_fix_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'agency_var_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php //echo $form->textFieldRow($model,'rent',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'other',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>