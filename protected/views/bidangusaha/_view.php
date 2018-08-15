<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bidang_usaha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bidang_usaha),array('view','id'=>$data->id_bidang_usaha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bidang_usaha')); ?>:</b>
	<?php echo CHtml::encode($data->bidang_usaha); ?>
	<br />


</div>