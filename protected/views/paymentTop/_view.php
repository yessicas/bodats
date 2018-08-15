<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_payment_top')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_payment_top),array('view','id'=>$data->id_payment_top)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_top')); ?>:</b>
	<?php echo CHtml::encode($data->payment_top); ?>
	<br />


</div>