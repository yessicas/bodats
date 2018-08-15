<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_posisi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_posisi),array('view','id'=>$data->id_posisi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_posisi')); ?>:</b>
	<?php echo CHtml::encode($data->nama_posisi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_update')); ?>:</b>
	<?php echo CHtml::encode($data->time_update); ?>
	<br />


</div>