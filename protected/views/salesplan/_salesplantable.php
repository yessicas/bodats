
<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	
	?>

</div>

<?php endif; ?>

<?php
	$statusHideSalesCost = true;
?>

<?php
	echo '<h3>Period : '.Timeanddate::getShortMonthIndo($month).' '.$year.'</h3>';
	
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 style="width:3000px;">
	<tr>
		<th width=10% colspan=5 style="text-align: center" bgcolor="#1A354F"> TUG & BARGE</th>
		<th width=5% colspan=2 style="text-align:center" bgcolor="#1A354F">  </th>
		<th width=15% colspan=9 style="text-align: center" bgcolor="#1A354F"> SALES PLAN </th>
		<th width=30% colspan=11 style="text-align: center" bgcolor="#1A354F"> STANDARD COST </th>
		<?php if($statusHideSalesCost == false) {?>
		<th width=40% colspan=22 style="text-align: center" bgcolor="#1A354F"> SALES COST </th>
		<?php } ?>		
		<th width=10% colspan=2 style="text-align:center" bgcolor="#1A354F"> GP </th>
	</tr>
<?php /*
	<tr>
		<td  align="center" bgcolor="#C7F2F2">No. </td>
		<td  align="center" bgcolor="#C7F2F2">Tug </td>
		<td  align="center" bgcolor="#C7F2F2">Barge </td>
		<td  align="center" bgcolor="#C7F2F2">Voyage Name </td>


		<td  align="center" bgcolor="#C7F2F2">No. </td>
		<td  align="center" bgcolor="#C7F2F2">Customer </td>
		<td  align="center" bgcolor="#C7F2F2">Loading </td>
		<td  align="center" bgcolor="#C7F2F2">Discharge </td>
		<td  align="center" bgcolor="#C7F2F2">Voy</td>
		<td  align="center" bgcolor="#C7F2F2">Ton</td>
		<td  align="center" bgcolor="#C7F2F2">USD/ Ton</td>
		<td  align="center" bgcolor="#C7F2F2">Total Revenue</td>
		<td  align="center" bgcolor="#C7F2F2">Fuel (Ltr) </td>


		<td  align="center" bgcolor="#C7F2F2">Fuel Cost </td>
		<td  align="center" bgcolor="#C7F2F2">Agency </td>
		<td  align="center" bgcolor="#C7F2F2">Depreciation</td>
		<td  align="center" bgcolor="#C7F2F2">Crew Cost</td>
		<td  align="center" bgcolor="#C7F2F2">Sub Cont </td>
		<td  align="center" bgcolor="#C7F2F2">Insurance</td>
		<td  align="center" bgcolor="#C7F2F2">Repair & Maintain</td>
		<td  align="center" bgcolor="#C7F2F2">Docking</td>
		<td  align="center" bgcolor="#C7F2F2">Brokerage fee</td>
		<td  align="center" bgcolor="#C7F2F2">Others </td>
		<td  align="center" bgcolor="#C7F2F2">Total Cost</td>
		<td  align="center" bgcolor="#C7F2F2">Margin</td>



		<!--<td width=1% align="center" colspan='2' bgcolor="#C7F2F2">Fuel (Ltr) </td>--> <!-- margin fuel liter ini dari mana -->


		<td align="center" colspan='2' bgcolor="#C7F2F2">Fuel Cost </td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Agency </td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Depreciation</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Crew Cost</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Sub Cont </td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Insurance</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Repair & Maintain</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Docking</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Brokerage fee</td>
		<td align="center" colspan='2' bgcolor="#C7F2F2">Others </td>
		<td align="center" bgcolor="#C7F2F2">Total Cost</td>
		<td align="center" bgcolor="#C7F2F2">Margin</td>



		<td align="center" bgcolor="#C7F2F2">Amount</td>
		<td align="center" bgcolor="#C7F2F2">Margin</td>
		<td align="center" bgcolor="#C7F2F2" colspan='2'> </td>
	</tr>
	*/



$headerTable='
	<tr>
		<td  align="center" bgcolor="#C7F2F2">No. </td>
		<td  align="center" bgcolor="#C7F2F2">Capacity </td>
		<td  align="center" bgcolor="#C7F2F2">Tug </td>
		<td  align="center" bgcolor="#C7F2F2">Barge </td>
		<td  align="center" bgcolor="#C7F2F2">Voyage Name </td>


		<td align="center" bgcolor="#C7F2F2" colspan="2"> 
		<td  align="center" bgcolor="#C7F2F2">No. </td>
		<td  align="center" bgcolor="#C7F2F2">Customer </td>
		<td  align="center" bgcolor="#C7F2F2">Loading </td>
		<td  align="center" bgcolor="#C7F2F2">Discharge </td>
		<td  align="center" bgcolor="#C7F2F2">Voy</td>
		<td  align="center" bgcolor="#C7F2F2">Ton</td>
		<td  align="center" bgcolor="#C7F2F2">Price / Ton</td>
		<td  align="center" bgcolor="#C7F2F2">Fuel (Ltr) </td> 
		<td  align="center" bgcolor="#C7F2F2">Total Revenue</td>
		<!--<td  align="center" bgcolor="#C7F2F2">??</td>-->';

			$headerTable .='		
			<td  align="center" bgcolor="#C7F2F2">Fuel Cost </td>
			<td  align="center" bgcolor="#C7F2F2">Agency </td>
			<td  align="center" bgcolor="#C7F2F2">Depreciation</td>
			<td  align="center" bgcolor="#C7F2F2">Crew Cost</td>
			<td  align="center" bgcolor="#C7F2F2">Sub Cont </td>
			<td  align="center" bgcolor="#C7F2F2">Insurance</td>
			<td  align="center" bgcolor="#C7F2F2">Repair & Maintain</td>
			<td  align="center" bgcolor="#C7F2F2">Docking</td>
			<td  align="center" bgcolor="#C7F2F2">Brokerage fee</td>
			<td  align="center" bgcolor="#C7F2F2">Others </td>
			<td  align="center" bgcolor="#C7F2F2">Standard Cost</td>
			<!--<td  align="center" bgcolor="#C7F2F2">Total Revenue</td>-->
			<td  align="center" bgcolor="#C7F2F2">Amount</td>
			<td  align="center" bgcolor="#C7F2F2">Margin</td>

			';		


		if($statusHideSalesCost == false){		
		$headerTable .='
		<!--<td width=1% align="center" colspan="2" bgcolor="#C7F2F2">Fuel (Ltr) </td>--> <!-- margin fuel liter ini dari mana -->


		<td align="center" colspan="2" bgcolor="#C7F2F2">Fuel Cost </td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Agency </td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Depreciation</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Crew Cost</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Sub Cont </td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Insurance</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Repair & Maintain</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Docking</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Brokerage fee</td>
		<td align="center" colspan="2" bgcolor="#C7F2F2">Others </td>
		<td align="center" bgcolor="#C7F2F2">Total Cost</td>
		<td align="center" bgcolor="#C7F2F2">Margin</td>



		<td align="center" bgcolor="#C7F2F2">Amount</td>
		<td align="center" bgcolor="#C7F2F2">Margin</td>
		';
		}
		$headerTable .='
	</tr>
	';

	?>


	<?php
		//Baca Tabel Set Type dan Barge
		$LIST_TUG_BARGE = SetTypeDB::getListAllTugBargeCurrent();
		$no = 0;
		foreach ($LIST_TUG_BARGE as $data){

			echo $headerTable; 
			
			$no++;
			if(isset($data->VesselTug)){
				$id_vessel_tug = $data->VesselTug->id_vessel;
			}else{
				echo SalesPlanViewer::displayDeletedVessel($data->tug);
				continue;
			}
			
			if(isset($data->VesselBarge)){
				$id_vessel_barge = $data->VesselBarge->id_vessel;
			}else{
				echo SalesPlanViewer::displayDeletedVessel($data->barge);
				continue;
			}
			
			if(isset($is_mode))
				$listdata = SalesPlanDB::getSalesPlanByTimeAndVessel($id_vessel_tug, $id_vessel_barge, $month, $year, $is_mode);
			else
				$listdata = SalesPlanDB::getSalesPlanByTimeAndVessel($id_vessel_tug, $id_vessel_barge, $month, $year);
			
			$numlistdata = count($listdata);
			$totdata = 0;
			if($totdata>0) {$totdata = $totdata-1;}
			
			$rowspanSetType = 1+$numlistdata;
			//Jika tidak ada data maka hanya menampilkan pasangan tug-barge saja
			if($numlistdata <= 0){
				echo '<tr>';
				echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$no.'. </td>';
				echo '<td rowspan="'.$rowspanSetType.'" align="center" ><h5>'.$data->VesselBarge->BargeSize.' ft</h5></td>';
				echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselTug->VesselName.' </td>';
				echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselBarge->VesselName.' </td>';
				echo '<td  rowspan="'.$rowspanSetType.'" align="center" > '.$data->voyage_number.' </td>';
				//echo '</tr>';
			}else{
				$rowspanSetType = $rowspanSetType+1;
			}
			
			//Display data jika ada datanya
			$no_data = 0;

			// var amount
			$totalTotalQuantity=0;
			$totalPriceUnit=0;
			$totalTotalRevenue=0;
			$totalFuelLtr=0;

			$totalFuelCost=0;
			$totalAgencyCost=0;
			$totalDepreciationCost=0;
			$totalCrewCost=0;
			$totalSubconCost=0;
			$totalIncuranceCost=0;
			$totalRepairCost=0;
			$totalDockingCost=0;
			$totalBrokerageCost=0;
			$totalOthersCost=0;
			$totalTotalStandardCost=0;
			$totalGP_COGM=0;


			$totalMarginFuelCost=0;
			$totalResultMarginFuelCost=0;

			$totalMarginAgencyCost=0;
			$totalResultMarginAgencyCost=0;

			$totalMarginDepreciationCost=0;
			$totalResultMarginDepreciationCost=0;

			$totalMarginCrewCost=0;
			$totalResultMarginCrewCost=0;

			$totalMarginSubconCost=0;
			$totalResultMarginSubconCost=0;

			$totalMarginIncuranceCost=0;
			$totalResultMarginIncuranceCost=0;

			$totalMarginRepairCost=0;
			$totalResultMarginRepairCost=0;

			$totalMarginDockingCost=0;
			$totalResultMarginDockingCost=0;

			$totalMarginBrokerageCost=0;
			$totalResultMarginBrokerageCost=0;

			$totalMarginOthersCost=0;
			$totalResultMarginOthersCost=0;

			$totalTotalSalesCost=0;
			$totalGP_COGS=0;
			// end var amount

			foreach($listdata as $sp){
				$no_data++;

				// amount
				$totalTotalQuantity=$totalTotalQuantity+$sp->TotalQuantity;
				$totalPriceUnit=$totalPriceUnit+$sp->PriceUnit;
				$totalTotalRevenue=$totalTotalRevenue+$sp->TotalRevenue;
				$totalFuelLtr=$totalFuelLtr+$sp->FuelLtr;

				$totalFuelCost=$totalFuelCost+$sp->FuelCost;
				$totalAgencyCost=$totalAgencyCost+$sp->AgencyCost;
				$totalDepreciationCost=$totalDepreciationCost+$sp->DepreciationCost;
				$totalCrewCost=$totalCrewCost+$sp->CrewCost;
				$totalSubconCost=$totalSubconCost+$sp->SubconCost;
				$totalIncuranceCost=$totalIncuranceCost+$sp->IncuranceCost;
				$totalRepairCost=$totalRepairCost+$sp->RepairCost;
				$totalDockingCost=$totalDockingCost+$sp->DockingCost;
				$totalBrokerageCost=$totalBrokerageCost+$sp->BrokerageCost;
				$totalOthersCost=$totalOthersCost+$sp->OthersCost;
				$totalTotalStandardCost=$totalTotalStandardCost+$sp->TotalStandardCost;
				$totalGP_COGM=$totalGP_COGM+$sp->GP_COGM;


				$totalMarginFuelCost=$totalMarginFuelCost+$sp->MarginFuelCost;
				$totalResultMarginFuelCost=$totalResultMarginFuelCost + addvaluepercented($sp->MarginFuelCost,$sp->FuelCost,$sp->MarginFuelCostMoney);

				$totalMarginAgencyCost=$totalMarginAgencyCost+$sp->MarginAgencyCost;
				$totalResultMarginAgencyCost=$totalResultMarginAgencyCost + addvaluepercented($sp->MarginAgencyCost,$sp->AgencyCost,$sp->MarginAgencyCostMoney);

				$totalMarginDepreciationCost=$totalMarginDepreciationCost+$sp->MarginDepreciationCost;
				$totalResultMarginDepreciationCost=$totalResultMarginDepreciationCost + addvaluepercented($sp->MarginDepreciationCost,$sp->DepreciationCost,$sp->MarginDepreciationCostMoney);

				$totalMarginCrewCost=$totalMarginCrewCost+$sp->MarginCrewCost;
				$totalResultMarginCrewCost=$totalResultMarginCrewCost + addvaluepercented($sp->MarginCrewCost,$sp->CrewCost,$sp->MarginCrewCostMoney);

				$totalMarginSubconCost=$totalMarginSubconCost+$sp->MarginSubconCost;
				$totalResultMarginSubconCost=$totalResultMarginSubconCost + addvaluepercented($sp->MarginSubconCost,$sp->SubconCost,$sp->MarginSubconCostMoney);

				$totalMarginIncuranceCost=$totalMarginIncuranceCost+$sp->MarginIncuranceCost;
				$totalResultMarginIncuranceCost=$totalResultMarginIncuranceCost + addvaluepercented($sp->MarginIncuranceCost,$sp->IncuranceCost,$sp->MarginIncuranceCostMoney);

				$totalMarginRepairCost=$totalMarginRepairCost+$sp->MarginRepairCost;
				$totalResultMarginRepairCost=$totalResultMarginRepairCost + addvaluepercented($sp->MarginRepairCost,$sp->RepairCost,$sp->MarginRepairCostMoney);

				$totalMarginDockingCost=$totalMarginDockingCost+$sp->MarginDockingCost;
				$totalResultMarginDockingCost=$totalResultMarginDockingCost + addvaluepercented($sp->MarginDockingCost,$sp->DockingCost,$sp->MarginDockingCostMoney);

				$totalMarginBrokerageCost=$totalMarginBrokerageCost+$sp->MarginBrokerageCost;
				$totalResultMarginBrokerageCost=$totalResultMarginBrokerageCost + addvaluepercented($sp->MarginBrokerageCost,$sp->BrokerageCost,$sp->MarginBrokerageCostMoney);

				$totalMarginOthersCost=$totalMarginOthersCost+$sp->MarginOthersCost;
				$totalResultMarginOthersCost=$totalResultMarginOthersCost + addvaluepercented($sp->MarginOthersCost,$sp->OthersCost,$sp->MarginOthersCostMoney);

				$totalTotalSalesCost=$totalTotalSalesCost+$sp->TotalSalesCost;
				$totalGP_COGS=$totalGP_COGS+$sp->GP_COGS;

				// end of amount

				echo '<tr>';
				
				if($no_data == 1){
					echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$no.'. </td>';
					echo '<td rowspan="'.$rowspanSetType.'" align="center" ><h5> '.$data->VesselBarge->BargeSize.' ft</h5></td>';
					echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselTug->VesselName.' </td>';
					echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselBarge->VesselName.' </td>';
					echo '<td rowspan="'.$rowspanSetType.'" align="center" > '.$sp->VoyageName.' </td>';
				}
				if($sp->Customer != null){
					$CompanyName = $sp->Customer->CompanyName;
				}else{
					$CompanyName = "-";
				}
				
				
				//Display Currency
				$currencystr = "CURRENCY NOT SET";
				if(isset($sp->Currency)){
					$currencystr = $sp->Currency->currency;
				}else{
					
				}
				
				
				$LoadingJetty = "UNKNOWN";
				if(isset($sp->LoadingPort)){
					$LoadingJetty = $sp->LoadingPort->JettyName;
				}else{
					$LoadingJetty = "UNKNOWN (".$sp->JettyIdStart.")";
				}
				
				$UnLoadingJetty = "UNKNOWN";
				if(isset($sp->UnloadingPort)){
					$UnLoadingJetty = $sp->UnloadingPort->JettyName;
				}else{
					$UnLoadingJetty = "UNKNOWN (".$sp->JettyIdEnd.")";
				}
				
				echo '

					<td style="text-align:center">'.CHtml::link("Edit ", Yii::app()->controller->createUrl("salesplan/editdetailsalesplan",array("id"=>$sp->id_sales_plan,"is_mode"=>Yii::app()->controller->action->id)), array("title"=>"Edit")).'</td>
					<td style="text-align:center">'.CHtml::link("Delete ", Yii::app()->controller->createUrl("salesplan/deletesalesplan",array("id"=>$sp->id_sales_plan,"is_mode"=>Yii::app()->controller->action->id)), array("title"=>"Delete",'class'=>'deletesalesplan')).'</td>

					<td  align="center" >'.$no_data.'.</td>
					<td  >'.$CompanyName.'</td>
					<td  >'.$LoadingJetty.'</td>
					<td  > '.$UnLoadingJetty.' </td>
					<td  align="center" >'.$sp->voyage_no.'</td>

					<td  style="text-align:right" >'.NumberAndCurrency::formatNumber($sp->TotalQuantity).'</td>
					<td  style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->PriceUnit).' '.$currencystr.'</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->FuelLtr).'</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->PriceUnit*$sp->TotalQuantity).'</td>

					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->FuelCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->AgencyCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->DepreciationCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->CrewCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->SubconCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->IncuranceCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->RepairCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->DockingCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->BrokerageCost).' IDR</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->OthersCost).' IDR</td>
				<!--<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->TotalRevenue).' IDR</td>-->
					<td  style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->TotalStandardCost).' '.$currencystr.'</td>
<!--untuk amount --> <!--<td style="text-align:right">'.NumberAndCurrency::formatCurrency(($totalTotalQuantity*$totalPriceUnit)-$sp->TotalRevenue).'</td> -->
<!--untuk margin --> <!--<td style="text-align:right">'.NumberAndCurrency::formatNumberTwoDigitDec($sp->GP_COGM).'%</td>-->
					';
					
					if($statusHideSalesCost == false){		
					echo '


					<!--<td width=10%  style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->MarginFuelCost).'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency(($sp->MarginFuelCost*$sp->FuelLtr)/100 ).'--><!-- ini dari mana asalnya margin fuelltr nya ga ada--></td>


	

					<td style="text-align:right">'.$sp->MarginFuelCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency(addvaluepercented($sp->MarginFuelCost,$sp->FuelCost,$sp->MarginFuelCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginAgencyCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency(addvaluepercented($sp->MarginAgencyCost,$sp->AgencyCost,$sp->MarginAgencyCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginDepreciationCost.'%</td>
					
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginDepreciationCost,$sp->DepreciationCost,$sp->MarginDepreciationCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginCrewCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginCrewCost,$sp->CrewCost,$sp->MarginCrewCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginSubconCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginSubconCost,$sp->SubconCost,$sp->MarginSubconCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginIncuranceCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginIncuranceCost,$sp->IncuranceCost,$sp->MarginIncuranceCostMoney) ).' IDR</td>
				
					<td style="text-align:right">'.$sp->MarginRepairCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginRepairCost,$sp->RepairCost,$sp->MarginRepairCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginDockingCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginDockingCost,$sp->DockingCost,$sp->MarginDockingCostMoney) ).' IDR</td>
					
					<td style="text-align:right">'.$sp->MarginBrokerageCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginBrokerageCost,$sp->BrokerageCost,$sp->MarginBrokerageCostMoney) ).' IDR</td>

					<td style="text-align:right">'.$sp->MarginOthersCost.'%</td>
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency( addvaluepercented($sp->MarginOthersCost,$sp->OthersCost,$sp->MarginOthersCostMoney) ).' IDR</td>
				
					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->TotalSalesCost).' IDR</td>
					<td style="text-align:right">'.$sp->GP_COGS.'%</td>




					<td style="text-align:right">'.NumberAndCurrency::formatCurrency($sp->TotalSalesCost).' IDR</td>
					<td style="text-align:right">'.$sp->GP_COGS.'%</td>
					
					';
					}
				
				echo '</tr>';
			}
			
			// end Display The Data jika ada datanya
			

			

			
			//Summary 
			if($numlistdata > 0){
				$margin = 0;
				if($totalTotalRevenue = 0){
					$margin = ($totalTotalRevenue-$totalTotalStandardCost) / $totalTotalRevenue;
				}
				
				// contoh kalo pake component
				echo '
			    <tr>
			    <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2" colspan="2">  </td>
				<td colspan=4 align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> AMOUNT </td>

				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>

				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatNumber($totalTotalQuantity).' </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalPriceUnit).' </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalFuelLtr).'</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($sp->PriceUnit*$sp->TotalQuantity).'</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalFuelCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalAgencyCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalDepreciationCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalCrewCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalSubconCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalIncuranceCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalRepairCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalDockingCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalBrokerageCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalOthersCost).' IDR</td>
			<!--<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalTotalStandardCost).' IDR</td>-->
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalTotalStandardCost).' IDR</td>
<!--amount-->   <td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatNumberTwoDigitDec($totalTotalRevenue-$totalTotalStandardCost).'
<!--margin-->   <td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatNumberTwoDigitDec($margin).'% </td>
				';
				
				if($statusHideSalesCost == false){		
				echo '
				
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginFuelCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginFuelCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginAgencyCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginAgencyCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginDepreciationCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginDepreciationCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginCrewCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginCrewCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginSubconCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginSubconCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginIncuranceCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginIncuranceCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginRepairCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginRepairCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginDockingCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginDockingCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginBrokerageCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginBrokerageCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.($totalMarginOthersCost / $no_data).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalResultMarginOthersCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalTotalSalesCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.round(($totalGP_COGS / $no_data),1).'% </td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.NumberAndCurrency::formatCurrency($totalTotalSalesCost).' IDR</td>
				<td align="center" style="font-weight:bold;text-align:right;" bgcolor="#C7F2F2"> '.round(($totalGP_COGS / $no_data),1).'% </td>
				
				';
				}

				echo '
				<!--
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 140 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 140 </td>
				-->

				</tr>';
			}
				
			//Button Add Sales Plan
			if(isset($is_mode))
				$url = Yii::app()->createUrl("salesplan/addsalesplan", array('id_tug'=>$data->tug, 'id_barge'=>$data->barge, 'month'=>$month, 'year'=>$year, 'is_mode'=>$is_mode));
			else
				$url = Yii::app()->createUrl("salesplan/addsalesplan", array('id_tug'=>$data->tug, 'id_barge'=>$data->barge, 'month'=>$month, 'year'=>$year));
			
			if($numlistdata > 0){
				echo '<tr>';
				$message = "";
			}else{
				$message = "Sales plan not set to this tug vessel.";
			}
				
			echo '
			<td colspan=4 height="40">';
			$this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Sales Plan Detail'),
                'icon'=>'plus white',
                'size'=>'mini',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>$url,
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                     
                                        ),
            
                ));
			//Display message  jika ada datanya
			echo '
			<td colspan="43" >'.$message.'
            </td>
			</tr>';
				
		}
		
	?>


	
	
		<?php /* // di hide dulu 
		<tr>
			<td width="20%" rowspan="3" align="center" > 6. </td><td width="35%" rowspan="3" align="center" > PATRIA 9 </td>
			<td width="35%" rowspan="3" align="center" > AIN </td><td width="10%" rowspan="3" align="center" >  </td>
				<td colspan=4 align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> AMOUNT </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 123 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>


				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>

				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 140 </td>

				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
				<td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> -2% </td>

				</tr>
			<tr>
			<td colspan=4 height="40"><a class="various fancybox.ajax btn btn-danger btn-mini" id="yw7" href="/erppmlbucket/salesplan/addsalesplan/id_tug/1770009/id_barge/1610102/month/01/year/2015"><i class="icon-plus icon-white"></i> Add Sales Plan Detail</a>
			<td colspan="20" >
            </td>
			</tr>

		 */ ?> 
	


<?php
	function addvaluepercented($margin,$standar,$marginMoney=1){

	if($margin > 0){
		$data = (($margin*$standar)/100)+$standar;
		return $data;
	}else{
		return $marginMoney;
	}
	
	}
?>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

$(".deletesalesplan").click(function(){
    if(confirm("Are you sure you want to Delete this ?")){
        $(".deletesalesplan").attr(jQuery(this).attr('href'));
    }
    else{
        return false;
    }
});

});

</script>

























<?php /*
<tr>
<td width=20% rowspan=4 align="center" > 1 </td>
<td width=35% rowspan=4 align="center" > PATRIA 10 </td>
<td width=35% rowspan=4 align="center" > AURIGA </td>
<td width=10% rowspan=4 align="center" > AUR </td>


<td width=10% align="center" > 1 </td>
<td width=10% align="center" > SRSJ </td>
<td width=10% align="center" > B Ninggi </td>
<td width=10% align="center" > Taboneo </td>
<td width=10%  align="center" > 1 </td>
<td width=10%  align="center" > 7300 </td>
<td width=10%  align="center" > 19 </td>
<td width=10%  align="center" > 20 </td>
<td width=10%  align="center" > 50 </td>


<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" > 15 </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 45000 </td>

<td width=10%  align="center" > 30 </td>
<td width=10%  align="center" > 35% </td>
</tr>

<tr>

<td width=10% align="center" > 2 </td>
<td width=10% align="center" > SRSJ </td>
<td width=10% align="center" > B Ninggi </td>
<td width=10% align="center" > Taboneo </td>
<td width=10%  align="center" > 1 </td>
<td width=10%  align="center" > 7300 </td>
<td width=10%  align="center" > 19 </td>
<td width=10%  align="center" > 20 </td>
<td width=10%  align="center" > 70 </td>

<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" > 15 </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 50 </td>
<td width=10%  align="center" > 25 </td>
<td width=10%  align="center" >  </td>
<td width=10%  align="center" > 7000 </td>
<td width=10%  align="center" > 45000 </td>

<td width=10%  align="center" > 40 </td>
<td width=10%  align="center" > 34% </td>

</tr>

<tr>
	<td colspan=4 >

			<?php  $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Sales Plan Detail'),
                'icon'=>'plus white',
                'size'=>'mini',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('salesplan/result'),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                     
                                        ),
            
                ));
                ?>
            </td>

    <td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>

	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>
	<td width=10%  align="center" >  </td>


	<td width=10%  align="center" > </td>
	<td width=10%  align="center" >  </td>
	
    </tr>

    <tr>

    <td colspan=4 align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> AMOUNT </td>
    <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
      <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
       <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 123 </td>
        <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>


     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 123 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 233 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 3 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2">  </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 140 </td>

      <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> 13.90 </td>
     <td align="center" style="font-weight:bold;" bgcolor="#C7F2F2"> -2% </td>
    
    </tr>
*/ ?>
</table>


