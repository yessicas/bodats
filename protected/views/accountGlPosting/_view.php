<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_gl_posting')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gl_posting),array('view','id'=>$data->id_gl_posting)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_account_gl')); ?>:</b>
	<?php echo CHtml::encode($data->id_account_gl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pair_number')); ?>:</b>
	<?php echo CHtml::encode($data->pair_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posting_date')); ?>:</b>
	<?php echo CHtml::encode($data->posting_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('drcr')); ?>:</b>
	<?php echo CHtml::encode($data->drcr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref')); ?>:</b>
	<?php echo CHtml::encode($data->ref); ?>
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