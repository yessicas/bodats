<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_certificate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_certificate),array('view','id'=>$data->id_certificate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certiface_level')); ?>:</b>
	<?php echo CHtml::encode($data->certiface_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>