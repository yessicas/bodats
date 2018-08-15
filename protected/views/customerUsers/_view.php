<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_customer_user),array('view','id'=>$data->id_customer_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />


</div>