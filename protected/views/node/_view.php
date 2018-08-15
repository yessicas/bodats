<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_node')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_node),array('view','id'=>$data->id_node)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('node_name')); ?>:</b>
	<?php echo CHtml::encode($data->node_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('node_acronym')); ?>:</b>
	<?php echo CHtml::encode($data->node_acronym); ?>
	<br />


</div>