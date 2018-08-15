<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_sales_cost')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sales_cost),array('view','id'=>$data->id_sales_cost)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdStart')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdEnd')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdEnd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargeSize')); ?>:</b>
	<?php echo CHtml::encode($data->BargeSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceUnit')); ?>:</b>
	<?php echo CHtml::encode($data->PriceUnit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('change_rate')); ?>:</b>
	<?php echo CHtml::encode($data->change_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FuelLtr')); ?>:</b>
	<?php echo CHtml::encode($data->FuelLtr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FuelCost')); ?>:</b>
	<?php echo CHtml::encode($data->FuelCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AgencyCost')); ?>:</b>
	<?php echo CHtml::encode($data->AgencyCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepreciationCost')); ?>:</b>
	<?php echo CHtml::encode($data->DepreciationCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CrewCost')); ?>:</b>
	<?php echo CHtml::encode($data->CrewCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rent')); ?>:</b>
	<?php echo CHtml::encode($data->Rent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubconCost')); ?>:</b>
	<?php echo CHtml::encode($data->SubconCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IncuranceCost')); ?>:</b>
	<?php echo CHtml::encode($data->IncuranceCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RepairCost')); ?>:</b>
	<?php echo CHtml::encode($data->RepairCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DockingCost')); ?>:</b>
	<?php echo CHtml::encode($data->DockingCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BrokerageCost')); ?>:</b>
	<?php echo CHtml::encode($data->BrokerageCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OthersCost')); ?>:</b>
	<?php echo CHtml::encode($data->OthersCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GP_COGM')); ?>:</b>
	<?php echo CHtml::encode($data->GP_COGM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginFuelCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginFuelCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginAgencyCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginAgencyCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginDepreciationCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginDepreciationCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginCrewCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginCrewCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginRent')); ?>:</b>
	<?php echo CHtml::encode($data->MarginRent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginSubconCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginSubconCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginIncuranceCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginIncuranceCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginRepairCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginRepairCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginDockingCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginDockingCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginBrokerageCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginBrokerageCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarginOthersCost')); ?>:</b>
	<?php echo CHtml::encode($data->MarginOthersCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GP_COGS')); ?>:</b>
	<?php echo CHtml::encode($data->GP_COGS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalRevenue')); ?>:</b>
	<?php echo CHtml::encode($data->TotalRevenue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalSalesCost')); ?>:</b>
	<?php echo CHtml::encode($data->TotalSalesCost); ?>
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