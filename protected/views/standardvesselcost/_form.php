<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'standard-vessel-cost-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span4')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName','VesselType'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'month',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'year',array('class'=>'span1', 'maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'depreciation_cost',array('class'=>'span4', 'maxlength'=>14)); ?>
	<?php echo $form->textFieldRow($model,'rent_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'crew_own_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'crew_subcont_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'insurance',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'repair',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'docking',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'brokerage_fee',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'others',array('class'=>'span4', 'maxlength'=>14)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span4','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span4','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>
