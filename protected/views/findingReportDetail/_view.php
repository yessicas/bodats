<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_finding_report_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_finding_report_detail),array('view','id'=>$data->id_finding_report_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_finding_report')); ?>:</b>
	<?php echo CHtml::encode($data->id_finding_report); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TrInventoryTreeId')); ?>:</b>
	<?php echo CHtml::encode($data->TrInventoryTreeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProblemIdentification')); ?>:</b>
	<?php echo CHtml::encode($data->ProblemIdentification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</b>
	<?php echo CHtml::encode($data->Location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ImageLink')); ?>:</b>
	<?php echo CHtml::encode($data->ImageLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CorrectiveAction')); ?>:</b>
	<?php echo CHtml::encode($data->CorrectiveAction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DueDate')); ?>:</b>
	<?php echo CHtml::encode($data->DueDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PreventiveAction')); ?>:</b>
	<?php echo CHtml::encode($data->PreventiveAction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>