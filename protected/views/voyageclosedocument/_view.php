<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_close_document')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_voyage_close_document),array('view','id'=>$data->id_voyage_close_document)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdVoyageDocument')); ?>:</b>
	<?php echo CHtml::encode($data->IdVoyageDocument); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoyageDocumentName')); ?>:</b>
	<?php echo CHtml::encode($data->VoyageDocumentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_date')); ?>:</b>
	<?php echo CHtml::encode($data->uploaded_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_user')); ?>:</b>
	<?php echo CHtml::encode($data->uploaded_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_uploaded')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_uploaded); ?>
	<br />


</div>