<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_friendship')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_friendship),array('view','id'=>$data->id_friendship)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_userid')); ?>:</b>
	<?php echo CHtml::encode($data->from_userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_userid')); ?>:</b>
	<?php echo CHtml::encode($data->to_userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_date')); ?>:</b>
	<?php echo CHtml::encode($data->req_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_date')); ?>:</b>
	<?php echo CHtml::encode($data->active_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>