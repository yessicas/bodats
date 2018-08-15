<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_temp_voyage'); ?>
		<?php echo $form->textField($model,'id_temp_voyage',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_voyage_order'); ?>
		<?php echo $form->textField($model,'id_voyage_order',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VoyageNumber'); ?>
		<?php echo $form->textField($model,'VoyageNumber',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VoyageOrderNumber'); ?>
		<?php echo $form->textField($model,'VoyageOrderNumber',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VONo'); ?>
		<?php echo $form->textField($model,'VONo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VOMonth'); ?>
		<?php echo $form->textField($model,'VOMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VOYear'); ?>
		<?php echo $form->textField($model,'VOYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_quotation'); ?>
		<?php echo $form->textField($model,'id_quotation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_so'); ?>
		<?php echo $form->textField($model,'id_so',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_voyage_order_plan'); ?>
		<?php echo $form->textField($model,'id_voyage_order_plan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_created'); ?>
		<?php echo $form->textField($model,'invoice_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bussiness_type_order'); ?>
		<?php echo $form->textField($model,'bussiness_type_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargingVesselTug'); ?>
		<?php echo $form->textField($model,'BargingVesselTug'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargingVesselBarge'); ?>
		<?php echo $form->textField($model,'BargingVesselBarge'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_settype_tugbarge'); ?>
		<?php echo $form->textField($model,'id_settype_tugbarge',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargeSize'); ?>
		<?php echo $form->textField($model,'BargeSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Capacity'); ?>
		<?php echo $form->textField($model,'Capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActualCapacity'); ?>
		<?php echo $form->textField($model,'ActualCapacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TugPower'); ?>
		<?php echo $form->textField($model,'TugPower'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargingJettyIdStart'); ?>
		<?php echo $form->textField($model,'BargingJettyIdStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargingJettyIdEnd'); ?>
		<?php echo $form->textField($model,'BargingJettyIdEnd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActualStartDate'); ?>
		<?php echo $form->textField($model,'ActualStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActualEndDate'); ?>
		<?php echo $form->textField($model,'ActualEndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_year'); ?>
		<?php echo $form->textField($model,'period_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_month'); ?>
		<?php echo $form->textField($model,'period_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_quartal'); ?>
		<?php echo $form->textField($model,'period_quartal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Price'); ?>
		<?php echo $form->textField($model,'Price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_currency'); ?>
		<?php echo $form->textField($model,'id_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'change_rate'); ?>
		<?php echo $form->textField($model,'change_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_price'); ?>
		<?php echo $form->textField($model,'fuel_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_user'); ?>
		<?php echo $form->textField($model,'created_user',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_user_updated'); ?>
		<?php echo $form->textField($model,'ip_user_updated',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_schedule'); ?>
		<?php echo $form->textField($model,'status_schedule',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_std_duration'); ?>
		<?php echo $form->textField($model,'cc_std_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_std_fuel'); ?>
		<?php echo $form->textField($model,'cc_std_fuel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_act_duration'); ?>
		<?php echo $form->textField($model,'cc_act_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_act_fuel_start'); ?>
		<?php echo $form->textField($model,'cc_act_fuel_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_act_fuel'); ?>
		<?php echo $form->textField($model,'cc_act_fuel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_std_cost'); ?>
		<?php echo $form->textField($model,'cc_std_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_std_margin'); ?>
		<?php echo $form->textField($model,'cc_std_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_act_cost'); ?>
		<?php echo $form->textField($model,'cc_act_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_act_margin'); ?>
		<?php echo $form->textField($model,'cc_act_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_date'); ?>
		<?php echo $form->textField($model,'approved_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_user'); ?>
		<?php echo $form->textField($model,'approved_user',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_user_approved'); ?>
		<?php echo $form->textField($model,'ip_user_approved',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user_createmultiple'); ?>
		<?php echo $form->textField($model,'id_user_createmultiple'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->