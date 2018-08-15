<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bank_account')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bank_account),array('view','id'=>$data->id_bank_account)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankName')); ?>:</b>
	<?php echo CHtml::encode($data->BankName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchAddress')); ?>:</b>
	<?php echo CHtml::encode($data->BranchAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankCity')); ?>:</b>
	<?php echo CHtml::encode($data->BankCity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountName')); ?>:</b>
	<?php echo CHtml::encode($data->AccountName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountNumber')); ?>:</b>
	<?php echo CHtml::encode($data->AccountNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Currency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	*/ ?>

</div>