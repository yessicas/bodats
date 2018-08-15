<?php $rowspan = 3; ?>
<tr>
	<td rowspan="<?php echo $rowspan; ?>">-</td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->BussinessTypeOrder->bussiness_type_order); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->VoyageNumber); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->VesselTug->VesselName); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->VesselBarge->VesselName); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->StartDate); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->JettyOrigin->JettyName); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->JettyDestination->JettyName); ?></td>
	<td rowspan="<?php echo $rowspan; ?>"><?php echo CHtml::encode($data->status); ?></td>
	<td>PR Agency</td>
</tr>
<tr>
	<td>PR Pengawalan Kargo</td>
</tr>
<tr>
	<td>Sailing Order</td>
</tr>