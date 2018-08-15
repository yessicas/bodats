<?php
	$cs=Yii::app()->clientScript;
	$cs->registerCSSFile('css/pmlstyle.css');
?>
<?php
	echo VoyageOrderDisplayer:: displayVoyageInfo3column($id_voyage_order, "98%", "0px");
	echo VoyageOrderDisplayer:: displayChangeRate($id_voyage_order, "98%", "0px");
?>
<style>	
	#standardcost b{
		font-size: 14px;
		font-weight: bold;
	}

	#standardcost table td{
		border: 0px solid #f7f7f7;
		padding: 2px;
	}
	
	#standardcost #right{
		text-align:right;
	}
	#standardcost #center{
		text-align:center;
	}
	#standardcost #spacer{
		background-color: #d7d7d7;
		line-height: 6px;
	}
	
	#standardcost #spacersummary{
		background-color: orange;
		line-height: 6px;
	}
	
	#standardcost #spacerwhite{
		background-color: white;
		line-height: 6px;
	}
	#standardcost #head{
		background-color: #336699;
		color: white;
		text-align:center;
	}
	
	#standardcost img{
		vertical-align: top;
		margin-top: 2px;
	}
</style>
<?php
	$this->widget('ext.tooltipster.tooltipster',
		array(
		'options' => array(
			//'theme' => 'tooltipster-light'
		))
	);
?>
<?php
	$vo = VoyageOrder::model()->findByPk($id_voyage_order);
	if($vo != null){
		$TOTAL_DAY = Timeanddate::getMaxDayFromDate($vo->StartDate);
		$STD = StandardCostDB::getStandardCost(
				$vo->BargingVesselTug, 
				$vo->BargingVesselBarge, 
				$vo->BargingJettyIdStart , 
				$vo->BargingJettyIdEnd ,
				$vo->fuel_price,
				$TOTAL_DAY
			);
		
		
		/**
		* Check terlebih dahulu apakah sudah pernah digenerate standard cost belum.
		* Jika belum, maka segera digenerate standard cost terlebih dahulu
		*/
		//if(!CostItemDB::checkCostStandardHasGenerated($id_voyage_order)){
			CostItemDB::generateAndSaveStandard($vo);
		//}
		
		/**
		* Ambil Data Actual Sesuai dengan kondisi sekarang
		*/
		$ACTUAL = CostControlDB::getActualCost($id_voyage_order);
			
		//Status SAILING
		$STATUS_VO = "FINISH";
		if($vo->status == "SHIPPING ORDER"){
			$STATUS_VO = "Voyage Not Yet Created";
		}
		if($vo->status == "VO CREATE"){
			$STATUS_VO = "Voyage Not Yet Sailing";
		}
		if($vo->status == "VO SAILING"){
			$STATUS_VO = "SAILING";
		}
		
		if($vo->status == "VO FINISH"){
			$STATUS_VO = "FINISH";
		}
?>

<div id="standardcost">
<table >
	<tr>
		<td colspan="3" id="head" width="35%"><b>Standard Cost</b></td>
		<td width="4%">&nbsp;</td>
		<td colspan="6" id="head" width="61%"><b>Actual Cost</b></td>
	</tr>
	<tr>
		<td width="120px">Standard Cycle Time
			<?php 
				if($STD["cycle_time"]->notes != "")
					echo Alert::displayTooltipLink($STD["cycle_time"]->notes, $STD["cycle_time"]->url);
			?>
		</td>
		<td width="10px">:</td>
		<td id="right" width="120px"><?php echo NumberAndCurrency::formatNumber($STD["cycle_time"]->value); ?> days</td>
		<td width="100px">&nbsp;</td>
		<td width="120px">Actual Duration
			<?php 
				if($ACTUAL["actual_duration"]->notes != "")
					echo Alert::displayTooltipLink($ACTUAL["actual_duration"]->notes, $ACTUAL["actual_duration"]->url);
			?>
		</td>
		<td width="10px">:</td>
		<td id="right" width="120px"><?php echo NumberAndCurrency::formatNumberTwoDigitDec($ACTUAL["actual_duration"]->value); ?> days</td>
		
		<td>&nbsp;</td>
		<td width="150px"><?php echo $STATUS_VO; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Fuel Standard</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatNumber($STD["fuel"]->value); ?> Liter</td>
		<td>&nbsp;</td>
		<td>Fuel Actual
		<?php 
				if($ACTUAL["fuel_consumption"]->notes != "")
					echo Alert::displayTooltipLink($ACTUAL["fuel_consumption"]->notes, $ACTUAL["fuel_consumption"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatNumber($ACTUAL["fuel_consumption"]->value); ?> Liter</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" id="spacer">&nbsp;</td>
		<td width="4%" id="spacerwhite">&nbsp;</td>
		<td colspan="6" id="spacer">&nbsp;</td>
	</tr>
	</tr>
	<tr>
		<td>Fuel Cost Standard
			<?php 
				if($STD["fuelcost"]->notes != "")
					echo Alert::displayTooltipLink($STD["fuelcost"]->notes, $STD["fuelcost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["fuelcost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Fuel Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["fuel_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php echo $STATUS_VO; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Agency Cost Standard
			<?php 
				if($STD["agency_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["agency_cost"]->notes, $STD["agency_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["agency_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Agency Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["agency_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php echo $ACTUAL["agency_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Crew (Own) Cost Standard
			<?php 
				if($STD["crew_own_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["crew_own_cost"]->notes, $STD["crew_own_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["crew_own_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Crew (Own) Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["crew_own_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><a href="<?php echo $ACTUAL["crew_own_cost"]->url; ?>" class="various fancybox.ajax"><?php echo $ACTUAL["crew_own_cost"]->notes; ?></a></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Crew (Subcont) Cost Standard
			<?php 
				if($STD["crew_subcont_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["crew_subcont_cost"]->notes, $STD["crew_subcont_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["crew_subcont_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Crew (Subcont) Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["crew_subcont_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><a href="<?php echo $ACTUAL["crew_subcont_cost"]->url; ?>" class="various fancybox.ajax"><?php echo $ACTUAL["crew_subcont_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Fuel Incentive</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["fuel_incentive"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["fuel_incentive"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>EHS Incentive</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["ehs_incentive"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["ehs_incentive"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	
	
	<tr>
		<td colspan="3" id="spacer">&nbsp;</td>
		<td width="4%" id="spacerwhite">&nbsp;</td>
		<td colspan="6" id="spacer">&nbsp;</td>
	</tr>
	<tr>
		<td>Depreciation Cost Standard
			<?php 
				if($STD["depreciation_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["depreciation_cost"]->notes, $STD["depreciation_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["depreciation_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Depreciation Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["depreciation_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["depreciation_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Insurance Cost Standard
			<?php 
				if($STD["insurance_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["insurance_cost"]->notes, $STD["insurance_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["insurance_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Insurance Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["insurance_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["insurance_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Repair Cost Standard
			<?php 
				if($STD["repair_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["repair_cost"]->notes, $STD["repair_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["repair_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Repair Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["repair_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["repair_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Docking Cost Standard
			<?php 
				if($STD["docking_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["docking_cost"]->notes, $STD["docking_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["docking_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Docking Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["docking_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["docking_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Brokerage Cost Standard
			<?php 
				if($STD["brokerage_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["brokerage_cost"]->notes, $STD["brokerage_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["brokerage_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Brokerage Cost Actual</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["brokerage_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["brokerage_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="3" id="spacer">&nbsp;</td>
		<td width="4%" id="spacerwhite">&nbsp;</td>
		<td colspan="6" id="spacer">&nbsp;</td>
	</tr>
	<tr>
	<tr>
		<td>Other Cost Standard
			<?php 
				if($STD["other_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["other_cost"]->notes, $STD["other_cost"]->url);
			?>
		</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($STD["other_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td>Consumable Stock Cost</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["consumable_stock_cost"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["consumable_stock_cost"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Fresh Water Cost</td>
		<td>:</td>
		<td id="right"><?php echo NumberAndCurrency::formatCurrency($ACTUAL["fresh_water"]->value); ?> IDR</td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["fresh_water"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" id="spacersummary">&nbsp;</td>
		<td width="4%" id="spacerwhite">&nbsp;</td>
		<td colspan="6" id="spacersummary">&nbsp;</td>
	</tr>
	<tr>
		<td><b>TOTAL STANDARD COST</b></td>
		<td>:</td>
		<td id="right"><b><?php echo NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value); ?> IDR</b></td>
		<td>&nbsp;</td>
		<td><b>TOTAL ACTUAL COST</b></td>
		<td>:</td>
		<td id="right"><b>
		<?php echo NumberAndCurrency::formatCurrency($ACTUAL["TOTAL_COST"]->value); ?> IDR</b></td>
		<td>&nbsp;</td>
		<td><?php $ACTUAL["TOTAL_COST"]->notes; ?></td>
		<td>&nbsp;</td>
	</tr>
</table>
</div>

<?php
}else{
	echo "Undefined Voyage Order";
}
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 600,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>
