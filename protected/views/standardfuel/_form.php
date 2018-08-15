<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'standard-fuel-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldRow($model,'type_set_feet',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type_set_power',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model,'JettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>


	<?php //echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>

    <?php //echo $form->textFieldRow($model,'typeway'); ?>
	<?php //echo $form->dropDownListRow($model,'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span5'));?>

    <?php echo $form->textFieldRow($model,'loaded'); ?>

	<?php echo $form->textFieldRow($model,'jarak',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'speed_standard',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'target_sailing_time',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'me_old'); ?>

	<?php echo $form->textFieldRow($model,'me_new'); ?>

	<?php //echo $form->textFieldRow($model,'ae_old'); ?>

	<?php echo $form->textFieldRow($model,'ae_new'); ?>

	<?php //echo $form->textFieldRow($model,'shift_old'); ?>

	<?php echo $form->textFieldRow($model,'shift_new'); ?>

	<?php //echo $form->textFieldRow($model,'outbond_old'); ?>

	<?php echo $form->textFieldRow($model,'outbond_new'); ?>

	<?php echo $form->textFieldRow($model,'sailing_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lay_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cycle_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'total_bbm',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'total_bbm_new',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'agency_rate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'agency_rate_id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>
