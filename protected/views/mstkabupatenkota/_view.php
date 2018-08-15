<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ibukota')); ?>:</b>
	<?php echo CHtml::encode($data->ibukota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propinsi')); ?>:</b>
	<?php echo CHtml::encode($data->id_propinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ibukotaprop')); ?>:</b>
	<?php echo CHtml::encode($data->ibukotaprop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jmlpenduduk')); ?>:</b>
	<?php echo CHtml::encode($data->jmlpenduduk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodebps')); ?>:</b>
	<?php echo CHtml::encode($data->kodebps); ?>
	<br />


</div>