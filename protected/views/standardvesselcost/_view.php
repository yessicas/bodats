<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_vessel_cost')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_standard_vessel_cost),array('view','id'=>$data->id_standard_vessel_cost)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depreciation_cost')); ?>:</b>
	<?php echo CHtml::encode($data->depreciation_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_own_cost')); ?>:</b>
	<?php echo CHtml::encode($data->crew_own_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_subcont_cost')); ?>:</b>
	<?php echo CHtml::encode($data->crew_subcont_cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('insurance')); ?>:</b>
	<?php echo CHtml::encode($data->insurance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair')); ?>:</b>
	<?php echo CHtml::encode($data->repair); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('docking')); ?>:</b>
	<?php echo CHtml::encode($data->docking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brokerage_fee')); ?>:</b>
	<?php echo CHtml::encode($data->brokerage_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('others')); ?>:</b>
	<?php echo CHtml::encode($data->others); ?>
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

	*/ ?>

</div>