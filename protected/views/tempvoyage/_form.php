<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temp-voyage-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_voyage_order'); ?>
		<?php echo $form->textField($model,'id_voyage_order',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_voyage_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VoyageNumber'); ?>
		<?php echo $form->textField($model,'VoyageNumber',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'VoyageNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VoyageOrderNumber'); ?>
		<?php echo $form->textField($model,'VoyageOrderNumber',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'VoyageOrderNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VONo'); ?>
		<?php echo $form->textField($model,'VONo'); ?>
		<?php echo $form->error($model,'VONo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VOMonth'); ?>
		<?php echo $form->textField($model,'VOMonth'); ?>
		<?php echo $form->error($model,'VOMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VOYear'); ?>
		<?php echo $form->textField($model,'VOYear'); ?>
		<?php echo $form->error($model,'VOYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_quotation'); ?>
		<?php echo $form->textField($model,'id_quotation',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_quotation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_so'); ?>
		<?php echo $form->textField($model,'id_so',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_so'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_voyage_order_plan'); ?>
		<?php echo $form->textField($model,'id_voyage_order_plan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_voyage_order_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_created'); ?>
		<?php echo $form->textField($model,'invoice_created'); ?>
		<?php echo $form->error($model,'invoice_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bussiness_type_order'); ?>
		<?php echo $form->textField($model,'bussiness_type_order'); ?>
		<?php echo $form->error($model,'bussiness_type_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BargingVesselTug'); ?>
		<?php echo $form->textField($model,'BargingVesselTug'); ?>
		<?php echo $form->error($model,'BargingVesselTug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BargingVesselBarge'); ?>
		<?php echo $form->textField($model,'BargingVesselBarge'); ?>
		<?php echo $form->error($model,'BargingVesselBarge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_settype_tugbarge'); ?>
		<?php echo $form->textField($model,'id_settype_tugbarge',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_settype_tugbarge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BargeSize'); ?>
		<?php echo $form->textField($model,'BargeSize'); ?>
		<?php echo $form->error($model,'BargeSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Capacity'); ?>
		<?php echo $form->textField($model,'Capacity'); ?>
		<?php echo $form->error($model,'Capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActualCapacity'); ?>
		<?php echo $form->textField($model,'ActualCapacity'); ?>
		<?php echo $form->error($model,'ActualCapacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TugPower'); ?>
		<?php echo $form->textField($model,'TugPower'); ?>
		<?php echo $form->error($model,'TugPower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BargingJettyIdStart'); ?>
		<?php echo $form->textField($model,'BargingJettyIdStart'); ?>
		<?php echo $form->error($model,'BargingJettyIdStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BargingJettyIdEnd'); ?>
		<?php echo $form->textField($model,'BargingJettyIdEnd'); ?>
		<?php echo $form->error($model,'BargingJettyIdEnd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
		<?php echo $form->error($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
		<?php echo $form->error($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActualStartDate'); ?>
		<?php echo $form->textField($model,'ActualStartDate'); ?>
		<?php echo $form->error($model,'ActualStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActualEndDate'); ?>
		<?php echo $form->textField($model,'ActualEndDate'); ?>
		<?php echo $form->error($model,'ActualEndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_year'); ?>
		<?php echo $form->textField($model,'period_year'); ?>
		<?php echo $form->error($model,'period_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_month'); ?>
		<?php echo $form->textField($model,'period_month'); ?>
		<?php echo $form->error($model,'period_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_quartal'); ?>
		<?php echo $form->textField($model,'period_quartal'); ?>
		<?php echo $form->error($model,'period_quartal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Price'); ?>
		<?php echo $form->textField($model,'Price'); ?>
		<?php echo $form->error($model,'Price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_currency'); ?>
		<?php echo $form->textField($model,'id_currency'); ?>
		<?php echo $form->error($model,'id_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'change_rate'); ?>
		<?php echo $form->textField($model,'change_rate'); ?>
		<?php echo $form->error($model,'change_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_price'); ?>
		<?php echo $form->textField($model,'fuel_price'); ?>
		<?php echo $form->error($model,'fuel_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_user'); ?>
		<?php echo $form->textField($model,'created_user',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'created_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_user_updated'); ?>
		<?php echo $form->textField($model,'ip_user_updated',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ip_user_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_schedule'); ?>
		<?php echo $form->textField($model,'status_schedule',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'status_schedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_std_duration'); ?>
		<?php echo $form->textField($model,'cc_std_duration'); ?>
		<?php echo $form->error($model,'cc_std_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_std_fuel'); ?>
		<?php echo $form->textField($model,'cc_std_fuel'); ?>
		<?php echo $form->error($model,'cc_std_fuel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_act_duration'); ?>
		<?php echo $form->textField($model,'cc_act_duration'); ?>
		<?php echo $form->error($model,'cc_act_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_act_fuel_start'); ?>
		<?php echo $form->textField($model,'cc_act_fuel_start'); ?>
		<?php echo $form->error($model,'cc_act_fuel_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_act_fuel'); ?>
		<?php echo $form->textField($model,'cc_act_fuel'); ?>
		<?php echo $form->error($model,'cc_act_fuel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_std_cost'); ?>
		<?php echo $form->textField($model,'cc_std_cost'); ?>
		<?php echo $form->error($model,'cc_std_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_std_margin'); ?>
		<?php echo $form->textField($model,'cc_std_margin'); ?>
		<?php echo $form->error($model,'cc_std_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_act_cost'); ?>
		<?php echo $form->textField($model,'cc_act_cost'); ?>
		<?php echo $form->error($model,'cc_act_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc_act_margin'); ?>
		<?php echo $form->textField($model,'cc_act_margin'); ?>
		<?php echo $form->error($model,'cc_act_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approved_date'); ?>
		<?php echo $form->textField($model,'approved_date'); ?>
		<?php echo $form->error($model,'approved_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approved_user'); ?>
		<?php echo $form->textField($model,'approved_user',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'approved_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_user_approved'); ?>
		<?php echo $form->textField($model,'ip_user_approved',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ip_user_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user_createmultiple'); ?>
		<?php echo $form->textField($model,'id_user_createmultiple'); ?>
		<?php echo $form->error($model,'id_user_createmultiple'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->