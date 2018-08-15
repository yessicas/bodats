<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_perusahaan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user_perusahaan),array('view','id'=>$data->id_user_perusahaan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perusahaan')); ?>:</b>
	<?php echo CHtml::encode($data->id_perusahaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeuser')); ?>:</b>
	<?php echo CHtml::encode($data->typeuser); ?>
	<br />


</div>