<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency_change_hist')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_currency_change_hist),array('view','id'=>$data->id_currency_change_hist)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_rate')); ?>:</b>
	<?php echo CHtml::encode($data->change_rate); ?>
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


</div>