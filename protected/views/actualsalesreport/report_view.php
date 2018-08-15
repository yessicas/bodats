<?php
$this->breadcrumbs=array(
	'Master Budget'=>array('masterbudget'),
	'',
);

$this->menu=array(
array('label'=>'Actual Sales Report','url'=>array('actualsalesreport/actualsales')),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('masterbudget-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>

<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    border: 1px solid #87A1A2;
    font-size: 12px;
}

th {
    font-weight: bold;
    color:black;
}

td{
    color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

[class^="icon-"], [class*=" icon-"] {

    margin: 1px 0px -1px 0px;
}

</style>

<?php
	echo '<h3> Actual Sales : '.Timeanddate::getShortMonthIndo($month).' '.$year. '</h3>';
?>
<hr style="margin-top:-10px;">

<?php
	//Datanya nanti disini saja, bagian bawah untuk display result
	/*Revenue*/
	$REVENUE_TONAGE_AFFCO = 0; //Nanti dibuat query sum untuk tonage (barging dan transhipment)
	$REVENUE_TONAGE_3P = 0;
	$REVENUE_TIMECHARTER_3P = 0;
	$REVENUE_FLOATING_CRATE_AFFCO = 0;
	
	$TOTAL_REVENUE = $REVENUE_TONAGE_AFFCO + $REVENUE_TONAGE_3P + $REVENUE_TIMECHARTER_3P + $REVENUE_FLOATING_CRATE_AFFCO;
	
	/*Ini Untuk Cost*/
	//Komponen Operational Cost
	$FUEL_COST = SalesPlanDB::getFuelCostPerYear($year) ;  //Querynya belum dibuat
	$DEPRECIATION_COST = SalesPlanDB::getDepreciationCostPerYear($year);
	$RENT_COST = SalesPlanDB::getRentPerYear($year) ; 
	$AGENT_COST = SalesPlanDB::getAgencyCostPerYear($year)   ; 
	$SUBCON_COST = SalesPlanDB::getSubconCostPerYear($year) ; 
	$BROKERAGE_COST = SalesPlanDB::getBrokerageCostPerYear($year) ; 
	$OTHER_COST = SalesPlanDB::getOthersCostPerYear($year) ; 
	$OPERATION_COST = $FUEL_COST + $DEPRECIATION_COST + $RENT_COST + $AGENT_COST + $SUBCON_COST + $BROKERAGE_COST + $OTHER_COST;
	
	//Komponen Running Cost
	$CREW_COST = SalesPlanDB::getCrewCostPerYear($year);
	$DOCKING_COST = SalesPlanDB::getDockingCostPerYear($year);
	$REPAIR_MAINTAIN_COST = SalesPlanDB::getRepairCostPerYear($year);
	$INSURANCE_COST = SalesPlanDB::getIncuranceCostPerYear($year);
	$RUNNING_COST = $CREW_COST + $DOCKING_COST + $REPAIR_MAINTAIN_COST + $INSURANCE_COST;
	
	//TOTAL COST
	$TOTAL_COST = $OPERATION_COST + $RUNNING_COST;


	$GROSS_PROFIT = $TOTAL_REVENUE-$TOTAL_COST;
	if($TOTAL_COST > 0){
		$GROSS_PROFIT_MARGIN = ($TOTAL_REVENUE-$TOTAL_COST)/$TOTAL_COST*100;
	}else{
		$GROSS_PROFIT_MARGIN = 100;
	}
?>

<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
	<tr>
	<th width=60% > 3. Revenue </th>
	<th  width=40%> <?php echo NumberAndCurrency::formatCurrency($TOTAL_REVENUE); ?> </th>
	</tr>
	
	<?php 
	if($level > 1) {
	?>
	
	<tr>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> Rev From Service - Tonnage - Affco & Rel </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($REVENUE_TONAGE_AFFCO); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> Rev From Service - Tonnage - 3rd Parties </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;">  <?php echo NumberAndCurrency::formatCurrency($REVENUE_TONAGE_3P); ?></td>
	</tr>

	<tr>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> Rev From Service - Time Charter 3r Parties </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($REVENUE_TIMECHARTER_3P); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> Rev From Service - Floating Crane - Affco & Rel </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($REVENUE_FLOATING_CRATE_AFFCO); ?>  </td>
	</tr>
	
	<?php } ?>

	<tr></tr>

	<tr>
	<th width=60% > 6. Cost Of Sales </th>
	<th  width=40%> <?php echo NumberAndCurrency::formatCurrency($TOTAL_COST); ?>  </th>
	</tr>

	<?php 
	if($level > 1) {
	?>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 20px;"> 6.1 Operation Cost </td>
	<td style="border:1px solid white; text-align: center; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($OPERATION_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.1 Rent </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($RENT_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.2 Bunker Fuel </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($FUEL_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.3 Depreciation </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($DEPRECIATION_COST); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.4 Agent Charge </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($AGENT_COST); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.5 Crew Subcontracting </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($SUBCON_COST); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.6 Brokerage (Management Fee) </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($BROKERAGE_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.1.7 Others </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($OTHER_COST); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 20px;"> 6.2 Running Cost </td>
	<td style="border:1px solid white; text-align: center; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($RUNNING_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.2.1 Crew Cost </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($CREW_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.2.2 Docking Cost </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($DOCKING_COST); ?> </td>
	</tr>

	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.2.3 Repair & Maintenance </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($REPAIR_MAINTAIN_COST); ?> </td>
	</tr>
	
	<tr>
	<td style="border:1px solid white; padding:0px 0px 0px 40px;"> 6.2.4 Insurance Cost </td>
	<td style="border:1px solid white; text-align: right; padding:0px 10px;"> <?php echo NumberAndCurrency::formatCurrency($INSURANCE_COST); ?> </td>
	</tr>
	
	
	<?php } ?>
	
	<tr></tr>

	<tr>
	<th width=60% > Gross Profit </th>
	<th  width=40%> <?php echo NumberAndCurrency::formatCurrency($GROSS_PROFIT); ?> </th>
	</tr>

	<tr>
	<th width=60% > Gross Profit Margin </th>
	<th  width=40%"> <?php echo NumberAndCurrency::formatCurrency($GROSS_PROFIT_MARGIN); ?>% </th>
	</tr>
</table>

