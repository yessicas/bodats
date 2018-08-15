<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userid),array('view','id'=>$data->userid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_id')); ?>:</b>
	<?php echo CHtml::encode($data->code_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('security_code')); ?>:</b>
	<?php echo CHtml::encode($data->security_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secret_question')); ?>:</b>
	<?php echo CHtml::encode($data->secret_question); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_secret_question')); ?>:</b>
	<?php echo CHtml::encode($data->answer_secret_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_activated')); ?>:</b>
	<?php echo CHtml::encode($data->status_activated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_addr_created')); ?>:</b>
	<?php echo CHtml::encode($data->ip_addr_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hit_count')); ?>:</b>
	<?php echo CHtml::encode($data->hit_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_logout')); ?>:</b>
	<?php echo CHtml::encode($data->last_logout); ?>
	<br />

	*/ ?>

</div>