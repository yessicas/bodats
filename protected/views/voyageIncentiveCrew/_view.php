<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_incentive_crew')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_voyage_incentive_crew),array('view','id'=>$data->id_voyage_incentive_crew)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_incentive')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_incentive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incentive_date')); ?>:</b>
	<?php echo CHtml::encode($data->incentive_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_incentive')); ?>:</b>
	<?php echo CHtml::encode($data->type_incentive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>