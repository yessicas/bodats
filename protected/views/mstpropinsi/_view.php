<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_propinsi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_propinsi),array('view','id'=>$data->id_propinsi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_country')); ?>:</b>
	<?php echo CHtml::encode($data->id_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodebps')); ?>:</b>
	<?php echo CHtml::encode($data->kodebps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodeiso')); ?>:</b>
	<?php echo CHtml::encode($data->kodeiso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ibukota')); ?>:</b>
	<?php echo CHtml::encode($data->ibukota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pulau')); ?>:</b>
	<?php echo CHtml::encode($data->pulau); ?>
	<br />


</div>