<?php
/* @var $this TempvoyageController */
/* @var $data TempVoyage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_temp_voyage')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_temp_voyage), array('view', 'id'=>$data->id_temp_voyage)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoyageNumber')); ?>:</b>
	<?php echo CHtml::encode($data->VoyageNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoyageOrderNumber')); ?>:</b>
	<?php echo CHtml::encode($data->VoyageOrderNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VONo')); ?>:</b>
	<?php echo CHtml::encode($data->VONo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VOMonth')); ?>:</b>
	<?php echo CHtml::encode($data->VOMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VOYear')); ?>:</b>
	<?php echo CHtml::encode($data->VOYear); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_quotation')); ?>:</b>
	<?php echo CHtml::encode($data->id_quotation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_so')); ?>:</b>
	<?php echo CHtml::encode($data->id_so); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order_plan')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_created')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bussiness_type_order')); ?>:</b>
	<?php echo CHtml::encode($data->bussiness_type_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargingVesselTug')); ?>:</b>
	<?php echo CHtml::encode($data->BargingVesselTug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargingVesselBarge')); ?>:</b>
	<?php echo CHtml::encode($data->BargingVesselBarge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_settype_tugbarge')); ?>:</b>
	<?php echo CHtml::encode($data->id_settype_tugbarge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargeSize')); ?>:</b>
	<?php echo CHtml::encode($data->BargeSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActualCapacity')); ?>:</b>
	<?php echo CHtml::encode($data->ActualCapacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TugPower')); ?>:</b>
	<?php echo CHtml::encode($data->TugPower); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargingJettyIdStart')); ?>:</b>
	<?php echo CHtml::encode($data->BargingJettyIdStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargingJettyIdEnd')); ?>:</b>
	<?php echo CHtml::encode($data->BargingJettyIdEnd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActualStartDate')); ?>:</b>
	<?php echo CHtml::encode($data->ActualStartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActualEndDate')); ?>:</b>
	<?php echo CHtml::encode($data->ActualEndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_year')); ?>:</b>
	<?php echo CHtml::encode($data->period_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_month')); ?>:</b>
	<?php echo CHtml::encode($data->period_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_quartal')); ?>:</b>
	<?php echo CHtml::encode($data->period_quartal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
	<?php echo CHtml::encode($data->Price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_rate')); ?>:</b>
	<?php echo CHtml::encode($data->change_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_price')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_schedule')); ?>:</b>
	<?php echo CHtml::encode($data->status_schedule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_std_duration')); ?>:</b>
	<?php echo CHtml::encode($data->cc_std_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_std_fuel')); ?>:</b>
	<?php echo CHtml::encode($data->cc_std_fuel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_act_duration')); ?>:</b>
	<?php echo CHtml::encode($data->cc_act_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_act_fuel_start')); ?>:</b>
	<?php echo CHtml::encode($data->cc_act_fuel_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_act_fuel')); ?>:</b>
	<?php echo CHtml::encode($data->cc_act_fuel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_std_cost')); ?>:</b>
	<?php echo CHtml::encode($data->cc_std_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_std_margin')); ?>:</b>
	<?php echo CHtml::encode($data->cc_std_margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_act_cost')); ?>:</b>
	<?php echo CHtml::encode($data->cc_act_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_act_margin')); ?>:</b>
	<?php echo CHtml::encode($data->cc_act_margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_date')); ?>:</b>
	<?php echo CHtml::encode($data->approved_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_user')); ?>:</b>
	<?php echo CHtml::encode($data->approved_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_approved')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_approved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_createmultiple')); ?>:</b>
	<?php echo CHtml::encode($data->id_user_createmultiple); ?>
	<br />

	*/ ?>

</div>