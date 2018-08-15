<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_invitation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_invitation),array('view','id'=>$data->id_invitation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invitation_date')); ?>:</b>
	<?php echo CHtml::encode($data->invitation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_user')); ?>:</b>
	<?php echo CHtml::encode($data->is_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_target')); ?>:</b>
	<?php echo CHtml::encode($data->email_target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid_target')); ?>:</b>
	<?php echo CHtml::encode($data->userid_target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid_sender')); ?>:</b>
	<?php echo CHtml::encode($data->userid_sender); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ipaddress_sender')); ?>:</b>
	<?php echo CHtml::encode($data->ipaddress_sender); ?>
	<br />

	*/ ?>

</div>