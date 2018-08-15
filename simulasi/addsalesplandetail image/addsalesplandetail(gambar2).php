<h4>Add Detail Sales Plan <?php if(isset($is_mode)){echo ucwords($is_mode);} ?></h4>
<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    border: 1px solid #87A1A2;
	font-size:12px;
}

th {
	font-weight: bold;
	color:#336699;
}

td{
	color: black;
}
</style>
<?php
	$subtitle ="";


	$title ="";
	if(isset($edit_mode)){
		$title ="Edit";
	}else{
		$title ="Add";
	}

	if(isset($is_mode)){$subtitle = ucwords($is_mode);} 
	
	if(($is_mode != "salesplan")){
		$this->menu=array(
			array('label'=>'Sales Plan '.$subtitle,'url'=>array('salesplan/'.$is_mode)),
			array('label'=>$title.' Detail Sales Plan '.$subtitle,'url'=>array('create'), 'active'=>true),
			//array('label'=>'Approve & Lock Sales Plan '.$subtitle,'url'=>array('salesplan/approve')),
		);
	}else{
		$this->menu=array(
			array('label'=>'Sales Plan','url'=>array('demand/salesplan')),
			array('label'=>$title.' Detail Sales Plan','url'=>array('create'), 'active'=>true),
			array('label'=>'Approve & Lock Sales Plan','url'=>array('salesplan/approve')),
		);
	}
?>
<?php
	$this->widget('ext.tooltipster.tooltipster',
		array(
		'options' => array(
			//'theme' => 'tooltipster-light'
		))
	);
?>
							
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sales-plan-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="view">
	<?php echo $form->hiddenField($model,'id_vessel_tug',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'id_vessel_barge',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'year',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'month',array('class'=>'span5')); ?>	
	<?php
		echo FormCommonDisplayer::displayRowInputReadonly("Month", CHtml::encode(Timeanddate::getFullMonthEng($model->month)));
		echo FormCommonDisplayer::displayRowInputReadonly("Year", CHtml::encode($model->year));
	?>
</div>

<?php
	$id_load = $model->JettyIdStart;
	$id_unload = $model->JettyIdEnd;
	$id_tug = $model->id_vessel_tug;
	$id_barge = $model->id_vessel_barge;
	$LoadJetty = JettyDB::getJetty($id_load);
	$UnLoadJetty = JettyDB::getJetty($id_unload);
	$TugVessel = VesselDB::getVessel($id_tug);
	$BargeVessel = VesselDB::getVessel($id_barge);
	
	$fuelprice = FuelDB::getCurrentFuelPrice();
	$STD = StandardCostDB::getStandardCost(
		$TugVessel->id_vessel, 
		$BargeVessel->id_vessel, 
		$LoadJetty->JettyId , 
		$UnLoadJetty->JettyId ,
		$fuelprice
	);
?>


<div class="view">		

	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_costumer"><?php echo "Customer"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php 
		if($model->Customer != null){
					$CompanyName = $model->Customer->CompanyName;
				}else{
					$CompanyName = "-";
		}
		?>
				
		<?php echo CHtml::textField('customer',$CompanyName,array('class'=>'span4', 'maxLength'=>10, 'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "PortLoading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('PortLoading',$LoadJetty->JettyName,array('class'=>'span4', 'maxLength'=>10, 'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "PortUnloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('PortUnloading',$UnLoadJetty->JettyName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	
	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Tug',$TugVessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	<?php echo "Tug Power : <b>".$TugVessel->Power."</b> HP";?>
	</div>
	</div>


	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Barge"><?php echo "Barge &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Barge',$BargeVessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	<?php echo "Barge Capacity : <b>".$BargeVessel->Capacity." MT / ".$BargeVessel->BargeSize." Ft</b>";?>
	</div>
	</div>

	
	<div class="control-group">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span3', 'maxLength'=>10,'id'=>'Quantity')); ?>
		MT
	</div>
	</div>

	<?php
	$exisDataOnSo=So::model()->findByAttributes(array('id_sales_plan'=>$model->id_sales_plan)); // edit salespla jika belum ada di tabel so
	if(!$exisDataOnSo){
		echo'<div align="right">';
		$this->widget('bootstrap.widgets.TbButton', array(
	           // 'icon'=>'print white',
	            'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	            'label' =>Yii::t('strings','Update'),
	            'url'=>array('salesplan/editsalesplan','id'=>$model->id_sales_plan,'id_tug'=>$id_tug,'id_barge'=>$id_barge,'month'=>$model->month,'year'=>$model->year,'is_mode'=>$_GET['is_mode']),
	        	 'htmlOptions' => array(
	                                        'class'=>'various fancybox.ajax',
	                                     
	                                        ),
	        )); 
		echo'</div>';
	}else{

		echo'<div class="alert alert-block alert-danger">
		you cannot edit this sales plan because has use on Shipping order 
		</div>';
	}
     ?>
</div>
   
	<div class="alert alert-info">Please update quantity and price also currency.</div>
	<div class="view">	

	
	<div class="control-group">	
	<div align="right" style="margin: 10px 16px -20px 215px;">
			<td style="text-align:center;">
			</td>
			<div class="gpmargin"><h4>GP Margin</h4>
				<?php echo $form->textField($model,
					'GP_COGM', 
					array('class'=>'span2', 
						  'id'=>'gpCOGM1',
						  'maxLength'=>10,
						  'readonly'=>'readonly',
						  'style'=>'margin:-80px -10px -23px -185px; text-align:center; height:40px; font-size:21px; font-weight: bold; color:gray;', 
					));			
				?>
				<h3>%</h3>
		</div>
		</div>
		<div class="control-group" style="margin: 32px 0px -75px 985px; white-space: nowrap; ">	 
		
		</div>
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span3', 'maxLength'=>10,'id'=>'Quantity')); ?>
		MT
	</div>
	</div>
	
	<?php
		$firstcol = $form->labelEx($model,'PriceUnit');
		$secondcol = $form->hiddenField($model,'PriceUnit',array('class'=>'span3','id'=>'price' ,'value'=>$STD["TOTAL_COST"]->value / $model->TotalQuantity,'readonly'=>'readonly')); //not formated
		$secondcol .= Chtml::textField('priceFormated',NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value / $model->TotalQuantity) ,array('class'=>'span3','id'=>'priceinput')); // formated 
		$secondcol .= " ".$form->dropDownList($model, 'id_currency',CHtml::listData(Currency::model()->findAll(array('order'=>'id_currency ASC')), 'id_currency', 'currency'),
		array('class'=>'span3'));
		$secondcol .= $form->error($model,'PriceUnit');
		echo FormCommonDisplayer::displayRowInput($firstcol, $secondcol);
	?>
	
	<?php //echo $form->textFieldRow($model,'VoyageName',array('class'=>'span3','maxlength'=>50)); ?>

	<?php if(isset($edit_mode)){ ?>
		<?php echo $form->textFieldRow($model,'voyage_no',array('class'=>'span2','maxlength'=>50)); ?>
	<?php } ?>

	<?php if(!isset($edit_mode)){ ?>
		<?php $value_voyage_no=SalesPlanDB::getSalesPlanVoyNo($model->id_vessel_barge,$model->year)?>
		<?php echo $form->textFieldRow($model,'voyage_no',array('class'=>'span2','maxlength'=>50,'value'=>$value_voyage_no)); ?>
	<?php } ?>


	<h3>Cost Standard</h3>
	<?php
		//Cost Standard Calculation
		echo "1 LTR HSD Solar = IDR ".NumberAndCurrency::formatCurrency($fuelprice);
	?>
	<?php
		$listcurrency = Currency::model()->findAll();
		foreach($listcurrency as $cur){
			if($cur->currency != "IDR"){
				echo '<br>1 '.$cur->currency.'= <input class="span2" maxlength="50" id="usd_rate" value="'.$cur->change_rate.'" type="text" disabled>IDR';
			}
		}
		$selectedCurrency = 'IDR';
	?>
	<div class="view">
	<table border="1">
		<tr>
			<td colspan="5" width="50%"><h4>Standard Cost</h4></td>
		<!--	<td colspan="5" width="50%"><h4>Sales Cost</h4></td> -->
		</tr> 
		<tr>
			<td>Standard Fuel Consumption
			<?php 
				if($STD["fuel"]->notes != "")
					echo Alert::displayTooltipLink($STD["fuel"]->notes, $STD["fuel"]->url);
			?>
			</td>
			<td style="text-align:right;">
			<?php echo NumberAndCurrency::formatcurrency($STD["fuel"]->value); ?>
				<?php //echo CHtml::hiddenField('fuelCostDiv',$STD["fuel"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'FuelConsumpt',array('class'=>'span3','maxLength'=>10,'id'=>'FuelConsumpt','value'=>$STD["fuel"]->value)); ?>
			</td>
			<td>LTR</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

		<!--<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td> -->
		</tr>

		<tr>
			<td>Cycle Time
			<?php 
				if($STD["cycle_time"]->notes != "")
					echo Alert::displayTooltipLink($STD["cycle_time"]->notes, $STD["cycle_time"]->url);
			?>
			</td>	
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["cycle_time"]->value); ?>
				<?php //echo CHtml::hiddenField('fuelCostDiv',$STD["fuel"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'CycleTime',array('class'=>'span3','maxLength'=>10,'id'=>'CycleTime','value'=>$STD["cycle_time"]->value)); ?>
			</td>
			<td>days</td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php echo addRowStandardSalesFuel('Fuel Cost', $model, $STD, "fuel", $form, 'FuelCost', 'MarginFuelCost',$fuelprice, $selectedCurrency); ?>
		<?php echo addRowStandardSales('Agency Cost', $model, $STD, "agency_cost", $form, 'AgencyCost', 'MarginAgencyCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Depreciation Cost', $model, $STD, "depreciation_cost", $form, 'DepreciationCost', 'MarginDepreciationCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Crew Own Cost', $model, $STD, "crew_own_cost", $form, 'CrewCost', 'MarginCrewCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Crew Subcont Cost', $model, $STD, "crew_subcont_cost", $form, 'SubconCost', 'MarginSubconCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Insurance Cost', $model, $STD, "insurance_cost", $form, 'IncuranceCost', 'MarginIncuranceCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Repair Cost', $model, $STD, "repair_cost", $form, 'RepairCost', 'MarginRepairCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Docking Cost', $model, $STD, "docking_cost", $form, 'DockingCost', 'MarginDockingCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Brokerage Cost', $model, $STD, "brokerage_cost", $form, 'BrokerageCost', 'MarginBrokerageCost', $selectedCurrency); ?>
		<?php echo addRowStandardSales('Others Cost', $model, $STD, "other_cost", $form, 'OthersCost', 'MarginOthersCost', $selectedCurrency); ?>
		
		<tr>
			<td colspan="0"></td>
		<!--	<td style="text-align:right;"><b>Agregat Margin</b> &nbsp; -->
				<?php echo CHtml::textField(
					'GP_COGM', 0,
					array('class'=>'span3', 
						  'id'=>'gpStd',
						'maxLength'=>10,
						//'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>%
			</td>
			<td colspan="0"></td>
		</tr>
		<tr>
			<td colspan="0"></td>
		</tr>
		<tr>
			<td style="text-align:right;"><b>STANDARD COST</b>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value); ?>
				<?php echo CHtml::hiddenField('TotalCostCountNotFormatedStd',$STD["TOTAL_COST"]->value,array('class'=>'span10','maxLength'=>10, 'id'=>'totalstdcosthidden')); ?>
			</td>
			<td><?php echo '<div class="selectedcur2">'.$selectedCurrency.'</div>'; ?></td>
			<!--<td><div class="rescomp">--</div></td>-->
			<td><div class="rescomp_standard_cost" style="text-align: right;">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
			<?php /*<td style="text-align:right;">*/ ?>

				<?php echo CHtml::hiddenField('TotalCostStd',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>

				<?php echo $form->hiddenField($model,
					'TotalStandardCost', 
					array('class'=>'span4', 
						'id'=>'TotalCostStdinput',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'value'=>$STD["TOTAL_COST"]->value,
						'style'=>'text-align:right',
					)); 
				?>

			<?php /*</td>*/ ?>
			<?php /*<td>IDR</td>*/ ?>
			
			<td style="text-align:right;">FREIGHT COST </td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('TotalCost',
					//NumberAndCurrency::formatCurrency(0), 
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>

				<?php echo $form->hiddenField($model,
					'TotalSalesCost', 
					array('class'=>'span4', 
						'id'=>'TotalCostinput',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'value'=>$STD["TOTAL_COST"]->value,
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td><?php echo '<div class="selectedcur2">'.$selectedCurrency.'</div>'; ?></td>
			<td><div class="rescomp">--</div></td>
			<td><div class="selectedcur2">USD</div></td>	
		</tr>

		<tr>
			<td style="text-align:right;"><b>TOTAL REVENUE</b>
			</td>
			<td style="text-align:right;">
			<div id="totrevenue">
				<?php 
					$totalcost = $STD["TOTAL_COST"]->value;
					$priceunit = $model->PriceUnit;
					$totalquantity = $model->TotalQuantity;
					
					$revenue = $priceunit*$totalquantity;
					//$gpamount = $revenue - $totalcost;
					echo NumberAndCurrency::formatCurrency ($revenue);
				?>
				
			</div>	
			<?php echo CHtml::hiddenField('TotalCostCountNotFormatedStd',$revenue,array('class'=>'span10','maxLength'=>10, 'id'=>'totrevenueValue')); ?>
			
				
				<?php /*echo CHtml::textField(
					'TOTAL_REVENUE', 0,
					array('class'=>'span8', 
						  'id'=>'totalRevenue',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					));*/ 
				?>
			</td>
			<td><?php echo '<div class="selectedcur2">'.$selectedCurrency.'</div>'; ?></td>
		<!--<td><div class="rescomp">--</div></td>-->
			<td><div class="rescomp_total_revenue" style="text-align: right;">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
			</td>
			<td style="text-align:right;"><b>TOTAL REVENUE</b>
			</td>
			<td style="text-align:right;">

				<?php echo CHtml::textField(
					'TOTAL_REVENUE', 0,
					array('class'=>'span8', 
						  'id'=>'totalRevenueSales',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td><?php echo '<div class="selectedcur2">'.$selectedCurrency.'</div>'; ?></td>
			<td><div class="rescomp">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
		</tr>
		</td>
		
		<tr>
			<td style="text-align:right;"><b>GP Revenue vs Standard Cost</b>
			</td>
			<td style="text-align:right;">
			
			<!--<div id="gpamout">
			<?php 
			/*
				$totalcost = $STD["TOTAL_COST"]->value;
				$priceunit = $model->PriceUnit;
				$totalquantity = $model->TotalQuantity;
				
				$gpamount = $revenue-$totalcost;
				echo NumberAndCurrency::formatCurrency ($gpamount);
			*/
			?>
			</div>
			-->
			<?php  //echo CHtml::hiddenFIeld ('TotalCostCountNotFormatedStd',$gpamount,array('class'=>'span10','maxLength'=>10, 'id'=>'gpamounthidden'));?>
		

				<?php echo $form->textField($model,
					'GP_COGM', 
					array('class'=>'span4', 
						  'id'=>'gpCOGM',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>

				<?php /*echo CHtml::textField('gpSales',
					0,
					array('class'=>'span4', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
					  */
				?>
			</td>
			<td>%</td>
			<td colspan="2"></td>
			
			<td style="text-align:right;"><b>GP Revenue vs Sales Cost</b>
			</td>
			<td style="text-align:right;">

				<?php echo $form->textField($model,
					'GP_COGS', 
					array('class'=>'span4', 
						  'id'=>'gpSales',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>

				<?php /*echo CHtml::textField('gpSales',
					0,
					array('class'=>'span4', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
					  */
				?>
			</td>
			<td>%</td>
			<td colspan="2"></td>
		</tr>
		
		<tr>
			<td style="text-align:right;" colspan="3"> <?php /* <b>FREIGHT COST</b> */ ?>
			</td>
		</tr>
		
		<tr>
			<td style="text-align:right;" colspan="5"><?php /* <b>FREIGHT COST PER MT</b>*/ ?>
			</td>
			<?php /*<td style="text-align:right;">*/ ?>
				<?php echo CHtml::hiddenField('costPerMtStd',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value / $model->TotalQuantity), 
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				
			<?php /*</td>*/ ?>
			<?php /*<td>IDR</td>*/ ?>
			
			<td style="text-align:right;">FREIGHT COST PER MT</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('costPerMtSales',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value / $model->TotalQuantity), 
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<!--<td><?php //echo '<div class="selectedcur">'.$selectedCurrency.'</div>'; ?></td>-->
			<td><div class="rescomp">--</div></td>
			<td><div class="selectedcur2">USD</div></td>	
			
		</tr>
		</tr>
	</table>
</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>


<?php
	function addRowStandardSales($rowTitle, $model, $STD, $STDfieldname, $form, $fieldColumnStandardDB, $fieldColumnMarginDB, $selectedCurrency){
		$DISP = '
		<tr>
			<td>'.$rowTitle.'
				';
				
				if($STD[$STDfieldname]->notes != "")
					$DISP .= Alert::displayTooltipLink($STD[$STDfieldname]->notes, $STD[$STDfieldname]->url);
					
				$model->$fieldColumnStandardDB = $STD[$STDfieldname]->value*1;
				
		$DISP .= '
			</td>
			<td style="text-align:right;">'.NumberAndCurrency::formatCurrency($STD[$STDfieldname]->value).'
			
			
			
			'.$form->hiddenField($model,$fieldColumnStandardDB,array('class'=>'span10','maxlength'=>50, 'readonly'=>'readonly','style'=>'text-align: right')).'
			</td>
			
			<td><div class="selectedcur2">'.$selectedCurrency.'</div></td> 
				<!--<td><div class="rescomp">--</div></td>-->
			<td><div class="rescomp_'.$STDfieldname.'" style="text-align: right;">--</div></td>
			<td><div class="selectedcur">USD</div></td>			
			
			<td style="text-align:right;">
			'.$form->textField($model,$fieldColumnMarginDB,array('class'=>'span3','maxlength'=>6,)).'
			%</td>
			<td style="text-align:right;">
				'.CHtml::textField($fieldColumnStandardDB,
					NumberAndCurrency::formatCurrency($STD[$STDfieldname]->value),
					array('class'=>'span10', 
						'maxLength'=>20,
						//'readonly'=>'readonly',
						'style'=>'text-align:right',
					))
				.$form->hiddenField($model,$fieldColumnMarginDB.'Money',array('class'=>'span10','maxLength'=>20,'value'=>$STD[$STDfieldname]->value,'id'=>$fieldColumnMarginDB.'Count')).
			'
			</td>
			<td><div class="selectedcur2">'.$selectedCurrency.'</div></td> 
			<td><div class="rescomp">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
		</tr>
		';
		
		return $DISP;
	}


	function addRowStandardSalesFuel($rowTitle, $model, $STD, $STDfieldname, $form, $fieldColumnStandardDB, $fieldColumnMarginDB,$fuelprice, $selectedCurrency){
		$fuel_cost = ($STD[$STDfieldname]->value)*$fuelprice;
		$DISP = '
		<tr>
			<td>'.$rowTitle.'
				';
				
				if($STD[$STDfieldname]->notes != "")
					$DISP .= Alert::displayTooltipLink($STD[$STDfieldname]->notes, $STD[$STDfieldname]->url);
					
				$model->$fieldColumnStandardDB = $fuel_cost;
				
		$DISP .= '
			</td>
			<td style="text-align:right;">'.NumberAndCurrency::formatCurrency($fuel_cost).'
			
			
			'.$form->hiddenField($model,$fieldColumnStandardDB,array('class'=>'span10','maxlength'=>50,'readonly'=>'readonly','style'=>'text-align: right')).'
			</td>
			
			
			<td><div class="selectedcur2">'.$selectedCurrency.'</div></td> 
			<!--<td><div class="rescomp" style="text-align: right;">--</div></td>-->
			<td><div class="rescomp_'.$STDfieldname.'" style="text-align: right;">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
			
			<td style="text-align:right;">
			'.$form->textField($model,$fieldColumnMarginDB,array('class'=>'span3','maxlength'=>6,)).'
			%</td>
			<td style="text-align:right;">
				'.CHtml::textField($fieldColumnStandardDB,
					NumberAndCurrency::formatCurrency($fuel_cost),
					array('class'=>'span10', 
						'maxLength'=>20,
						//'readonly'=>'readonly',
						'style'=>'text-align:right',
					))
				.$form->hiddenField($model,$fieldColumnMarginDB.'Money',array('class'=>'span11','maxLength'=>20,'id'=>$fieldColumnMarginDB.'Count','value'=>$fuel_cost,)).
			'
			</td>
			<td><div class="selectedcur2">'.$selectedCurrency.'</div></td> 
			<td><div class="rescomp">--</div></td>
			<td><div class="selectedcur">USD</div></td>	
		</tr>
		';
		
		return $DISP;
	}
?>


<script>
$(document).ready(function(){
	
	var formatcurrencynya = function(num){
		var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
		if(str.indexOf(".") > 0) {
			parts = str.split(".");
			str = parts[0];
		}
		str = str.split("").reverse();
		for(var j = 0, len = str.length; j < len; j++) {
			if(str[j] != ",") {
				output.push(str[j]);
				if(i%3 == 0 && j < (len - 1)) {
					output.push(",");
				}
				i++;
			}
		}
		formatted = output.reverse().join("");
		var formatedCurrency= (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
		return formatedCurrency; 
	};
	
		var gp = parseFloat(this.value);

		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'FuelCost','MarginFuelCost') ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'AgencyCost', 'MarginAgencyCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'DepreciationCost', 'MarginDepreciationCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'CrewCost', 'MarginCrewCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'SubconCost', 'MarginSubconCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'IncuranceCost', 'MarginIncuranceCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'RepairCost', 'MarginRepairCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'DockingCost', 'MarginDockingCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'BrokerageCost', 'MarginBrokerageCost'); ?>
		<?php echo addJqueryPersen(SalesPlanDB::selectModel($is_mode), 'OthersCost', 'MarginOthersCost'); ?>
				

		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'FuelCost','MarginFuelCost') ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'AgencyCost', 'MarginAgencyCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'DepreciationCost', 'MarginDepreciationCost');?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'CrewCost', 'MarginCrewCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'SubconCost', 'MarginSubconCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'IncuranceCost', 'MarginIncuranceCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'RepairCost', 'MarginRepairCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'DockingCost', 'MarginDockingCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'BrokerageCost', 'MarginBrokerageCost'); ?>
		<?php echo addJqueryPersenontotal(SalesPlanDB::selectModel($is_mode), 'OthersCost', 'MarginOthersCost'); ?>


 		$('#gpStd').keyup(function () {  
		 // setiap karakter yang diketik selain angka akan langsung dihapus   
		 this.value = this.value.replace(/[^0-9\.\-]/g,'');
		 });


		$('#Quantity').keyup(function () {  
		  // setiap karakter yang diketik selain angka akan langsung dihapus   
		  this.value = this.value.replace(/[^0-9\.\-]/g,'');
		});
				
		$('#gpStd').blur(function () {  
			var gp = parseFloat(this.value);
			calculatePercentage(gp);
		 });
				
		$('#priceinput').change(function () {  
			changePriceQuantity();
		});
		
		$('#Quantity').change(function () {  
			changePriceQuantity();
			
		});
		
		$('#SalesPlan_id_currency').change(function () {  
			var cr = this.value;
			changeCurrency(cr);
			
		});
		var cr = $('#SalesPlan_id_currency').val();
		changeCurrency(cr);		


		<?php if(isset($edit_mode)){ ?>

		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'FuelCost','MarginFuelCost',$model) ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'AgencyCost', 'MarginAgencyCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'DepreciationCost', 'MarginDepreciationCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'CrewCost', 'MarginCrewCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'SubconCost', 'MarginSubconCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'IncuranceCost', 'MarginIncuranceCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'RepairCost', 'MarginRepairCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'DockingCost', 'MarginDockingCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'BrokerageCost', 'MarginBrokerageCost',$model); ?>
		<?php echo addJqueryPersenonUpdate(SalesPlanDB::selectModel($is_mode), 'OthersCost', 'MarginOthersCost',$model); ?>
		// -- //
		<?php } ?> 
	});
	
	function changeCurrency(cr){
		//alert('currecy diubah'+cr);
		//$('#selectedcur').html(cr);
		var curlist = new Array();
		curlist[1] = "IDR"; 
		curlist[2] = "USD"; 
		curlist[3] = "SGD"; 
		
		$(".selectedcur").html(curlist[cr]);
		var selectedcur = curlist[cr];
		var devider = 1;
		if(selectedcur != "IDR"){
			devider = $("#"+selectedcur+"_rate").val();
		}
	}
	
	//Menampilkan hasilnya
		if(devider > 0){
			//Agency Fuel
			var agencyidr = $ ("#Salesplan_AgencyCost").val();
			agencyidr = agency*idr1;
			var agencynew1 = formatCurrencyJs (agencyidr/devider);
			//alert(agencynew);
			$(".rescomp_agency_cost").html(agencynew1);
		}
		
		//Fuel Cost 
		var agencyidr = $("#Salesplan_FuelCost").val();
			agencyidr = agencyidr*1;
			var agencynew2 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_fuel").html(agencynew2);
			
		//Depreciation Cost
			var agencyidr = $("#SalesPlan_DepreciationCost").val();
			agencyidr = agencyidr*1;
			//var agencynew = agencyidr/devider;
			var agencynew3 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_depreciation_cost").html(agencynew3);
			
		//CrewCost  
			var agencyidr = $("#SalesPlan_CrewCost").val();
			agencyidr = agencyidr*1;
			var agencynew4 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_crew_own_cost").html(agencynew4);
			
		//SubconCost
			var agencyidr = $("#SalesPlan_SubconCost").val();
			agencyidr = agencyidr*1;
			var agencynew5 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_crew_subcont_cost").html(agencynew5);
			
		//IncuranceCost
			var agencyidr = $("#SalesPlan_IncuranceCost").val();
			agencyidr = agencyidr*1;
			var agencynew6 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_insurance_cost").html(agencynew6);
			
		//RepairCost
			var agencyidr = $("#SalesPlan_RepairCost").val();
			agencyidr = agencyidr*1;
			var agencynew7 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_repair_cost").html(agencynew7);
			
		//DockingCost
			var agencyidr = $("#SalesPlan_DockingCost").val();
			agencyidr = agencyidr*1;
			var agencynew8 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_docking_cost").html(agencynew8);

		//Brokerage
			var agencyidr = $("#SalesPlan_BrokerageCost").val();
			agencyidr = agencyidr*1;
			var agencynew9 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_brokerage_cost").html(agencynew9);

		//OthersCost
			var agencyidr = $("#SalesPlan_OthersCost").val();
			agencyidr = agencyidr*1;
			var agencynew10 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_other_cost").html(agencynew10);
			
		//StandardCost
			var agencyidr = $("#totalstdcosthidden").val();
			agencyidr = agencyidr*1;totalstdcosthidden
			var agencynew11 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_standard_cost").html(agencynew11);
			
		//TotalRevenue
			var agencyidr = $("#totrevenueValue").val();
			agencyidr = agencyidr*1;
			var agencynew12 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_total_revenue").html(agencynew12);
			
		//GpAmount
			var agencyidr = $("#gpamounthidden").val();
			agencyidr = agencyidr*1;
			var agencynew13 = formatCurrencyJs(agencyidr/devider);
			$(".rescomp_gp_amount").html(agencynew13);
			
		}
	
	function changePriceQuantity(){
		calculateGPRevVsStandard();
		calculateGPRevVsSalesCost();
	}
	
		function formatCurrencyJs(value){
		var num =  value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return num;
	}
	
	
	function calculateMarginSales(){
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginFuelCost'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginAgencyCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginDepreciationCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginCrewCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginSubconCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginIncuranceCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginRepairCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginDockingCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginBrokerageCostCount'); ?>
		<?php echo addMarginTrigger(SalesPlanDB::selectModel($is_mode),'MarginOthersCostCount'); ?>
	}

	function calculatePercentage(gp){
		var totalCostCountNotFormatedStd=$('#totalstdcosthidden').val(); 
		var contsVal= parseFloat(totalCostCountNotFormatedStd) ; 
		var percentCount = parseFloat(( gp * contsVal ) / 100); 
		var resultCount = contsVal  + percentCount; 
		var formatedCount =formatcurrencynyaout(resultCount); 
		var costperMt = parseFloat(resultCount) / $('#Quantity').val();
		var costperMtFormated=formatcurrencynyaout(costperMt); 
		$('#TotalCostStd').val(formatedCount);
		$('#TotalCostStdinput').val(resultCount);
		$('#costPerMtStd').val(costperMtFormated);
		
		// update margin sesuai dengan gpstd 
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode),'MarginFuelCost', 'FuelCost', $model) ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginAgencyCost', 'AgencyCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginDepreciationCost', 'DepreciationCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginCrewCost', 'CrewCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginSubconCost', 'SubconCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginIncuranceCost', 'IncuranceCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginRepairCost', 'RepairCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginDockingCost', 'DockingCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginBrokerageCost', 'BrokerageCost', $model); ?>
		<?php echo addJqueryPersen2Out(SalesPlanDB::selectModel($is_mode), 'MarginOthersCost', 'OthersCost', $model); ?>
		

		// hitung ulang gpstd
		<?php //echo addJqueryPersengpstd(SalesPlanDB::selectModel($is_mode), 'MarginOthersCost'); ?>
		calculateTotalCost();
	}
	
	function calculateTotalCost(){
		var tot = new Array();
		tot[1] =parseFloat($('#MarginFuelCostCount').val()); 
		tot[2] =parseFloat($('#MarginAgencyCostCount').val());
		tot[3] =parseFloat($('#MarginDepreciationCostCount').val());
		tot[4] =parseFloat($('#MarginCrewCostCount').val());
		tot[5] =parseFloat($('#MarginSubconCostCount').val());
		tot[6] =parseFloat($('#MarginIncuranceCostCount').val()); 
		tot[7] =parseFloat($('#MarginRepairCostCount').val());
		tot[8] =parseFloat($('#MarginDockingCostCount').val());
		tot[9] =parseFloat($('#MarginBrokerageCostCount').val());
		tot[10] =parseFloat($('#MarginOthersCostCount').val());
		var totalsalescost = 0;
		for(var j=1;j<=10;j++){
			totalsalescost = totalsalescost + tot[j];
		}
		
		
		$('#TotalCostinput').val(totalsalescost);
		var totalsalescostformat=formatcurrencynyaout(totalsalescost); 
		$('#TotalCost').val(totalsalescostformat);
		
		calculateGPRevVsSalesCost();
	}
	
	function calculateGPRevVsStandard(){
		var priceinput=parseFloat($('#priceinput').val());
		
		var quantity=parseFloat($('#Quantity').val());
		var total = priceinput*quantity;
		var stdcost=$('#totalstdcosthidden').val();
		var gp = 0;
		if(total > 0){
			gp = ((total-stdcost)/stdcost)*100;
		}
		
		$('#gpCOGM1').val(gp.toFixed(1));
		$('#gpCOGM').val(gp.toFixed(1));
		$('#totrevenue').html(formatCurrencyJs(total));
		$('.rescomp_total_revenue').html(formatCurrencyJs(total));
		
		
		alert('GP updated with '+ gp.toFixed(1) +'%');
	}
	
	function calculateGPRevVsSalesCost(){
		var priceinput=parseFloat($('#priceinput').val());
		var quantity=parseFloat($('#Quantity').val());
		var total = priceinput*quantity;
		var salescost=$('#TotalCostinput').val();
		var gp = 0;
		if(total > 0){
			gp = ((total-salescost)/salescost)*100;
		}
		
		var gpamount = total-salescost;
		$('#gpamount').html(formatcurrencynyaout(gpamount));
		$('#gpSales').val(gp.toFixed(1));
		$('#totalRevenueSales').val(formatcurrencynyaout(total));	
		
		var priceunit = 0;
		if(quantity > 0){
			priceunit = salescost/quantity;
		}
		$('#costPerMtSales').val(priceunit.toFixed(1));
		
	}
	
	function updatePriceUnit(){
		//var priceunit=$('#costPerMtSales').val();
		//$('#priceinput').val(priceunit);
	}
	
	function updateGPStd(){
		updatePriceUnit();
		var gp = parseFloat($('#gpSales').val());
		$('#gpStd').val(gp);
	}
	
	function gpStdChange(){
		var gp = parseFloat($('#gpStd').val());
		calculatePercentage(gp);
		updatePriceUnit();
	}
	
	function firstUpload(){
		<?php 
		if($model->PriceUnit > 0)
		{
			echo "var priceunit = ".$model->PriceUnit.";";
			echo "$('#priceinput').val(priceunit);";
		}
		?>
		//changePriceQuantity();
		calculateMarginSales();
	}
	
		function replaceChars(entry,id_ori) {
		out = ","; // replace this
		add = ""; // with this
		temp = "" + entry; // temporary holder

		while (temp.indexOf(out)>-1) {
			pos= temp.indexOf(out);
			temp = "" + (temp.substring(0, pos) + add + 
			temp.substring((pos + out.length), temp.length));
		}

		if(entry==''){
			document.getElementById(id_ori).value = 0;
		}else{
			document.getElementById(id_ori).value = temp;
		}
	}

	function trimNumber(s) {
	  while (s.substr(0,1) == '0' && s.length>1) { s = s.substr(1,9999); }
	  while (s.substr(0,1) == ',' && s.length>1) { s = s.substr(1,9999); }
	  return s;
	}

	function formatangka(objek) {
		a = objek.value;
		b = a.replace(/[^\.\d]/g,"");
		c = "";
		panjang = b.length;
		j = 0;
		for (i = panjang; i > 0; i--) {
			j = j + 1;
			if (((j % 3) == 1) && (j != 1)) {
				c = b.substr(i-1,1) + "," + c;
			} else {
				c = b.substr(i-1,1) + c;
			}
		}
		objek.value = trimNumber(c);
	}
	
	function formatcurrencynyaout(num){
		var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
		if(str.indexOf(".") > 0) {
			parts = str.split(".");
			str = parts[0];
		}
		str = str.split("").reverse();
		for(var j = 0, len = str.length; j < len; j++) {
			if(str[j] != ",") {
				output.push(str[j]);
				if(i%3 == 0 && j < (len - 1)) {
					output.push(",");
				}
				i++;
			}
		}
		formatted = output.reverse().join("");
		var formatedCurrency= (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
		return formatedCurrency; 
	};
</script>





<?php

	function addMarginTrigger($modelName,$marginName){
		$DISP = "$('#".$modelName."_".$marginName."').trigger('change');";
		return $DISP;
	}

	function addJqueryPersen($modelName,$salesName,$marginName){
		$DISP = "$('#".$modelName."_".$marginName."').keyup(function () {  
			  // setiap karakter yang diketik selain angka akan langsung dihapus   
			  this.value = this.value.replace(/[^0-9\.\-]/g,'');
			});
		";
		
		$DISP .="
		$('#".$modelName."_".$marginName."').change(function () {  
			var stdval = $('#".$modelName."_".$salesName."').val();
			var gpnew = parseFloat(this.value);
			var tot = ((100+gpnew)/100)*stdval;
			$('#".$salesName."').val(formatcurrencynyaout(tot.toFixed(1)));
			$('#Margin".$salesName."Count').val(tot.toFixed(1));
			calculateTotalCost();
			updateGPStd();
		});
		";
		return $DISP;
	}



	// onload 
	function addJqueryPersenonUpdate($modelName,$salesName,$marginName,$model){
		$marginNameMoney=$marginName."Money";
		$DISP ="  

	     var contsVal= parseFloat($('#".$modelName."_".$salesName."').val()) ;

	     if ($('#".$modelName."_".$marginName."').val() > 0.0){ // jika data standarny nol  di ambil data marginMoney
	     	var percentCount = parseFloat(( $('#".$modelName."_".$marginName."').val() * contsVal ) / 100);
	     	var resultCount = contsVal  + percentCount;
	     }else{
	     	//var percentCount = parseFloat(( $('#".$modelName."_".$marginName."').val() * contsVal ) / 100);
	     	var resultCount = ".$model->$marginNameMoney.";
	     }


	     var formatedCount =formatcurrencynya(resultCount);

	     $('#".$salesName."').val(formatedCount);
	     $('#".$marginName."Count').val(resultCount);
		";
		$DISP = "";
		
		return $DISP;

	}

	function addJqueryPersen2Fuel($modelName,$marginName){
		$DISP = "
			$('#".$modelName."_".$marginName."').val(this.value);
			$('#".$modelName."_".$marginName."').trigger('blur');
		";

		return $DISP;
	}
	
	function addJqueryPersen2Out($modelName,$marginName, $totalName, $model){
		$DISP = "
			$('#".$modelName."_".$marginName."').val(gp.toFixed(1));
			var stdval = $('#".$modelName."_".$totalName."').val();
			var tot = ((100+gp)/100)*stdval;
			$('#".$totalName."').val(formatcurrencynyaout(tot.toFixed(1)));
			$('#Margin".$totalName."Count').val(tot.toFixed(1));
		";
		//$('#".$totalName."').val(gp.toFixed(1));
		//$('#".$modelName."_".$marginName."').trigger('blur');
		
		$DISP .="
		$('#".$modelName."_".$marginName."').change(function () {  
			
			var stdval = $('#".$modelName."_".$totalName."').val();
			var gpnew = parseFloat(this.value);
			var tot = ((100+gpnew)/100)*stdval;
			$('#".$totalName."').val(formatcurrencynyaout(tot.toFixed(1)));
			$('#Margin".$totalName."Count').val(tot.toFixed(1));
			calculateTotalCost();
			updateGPStd();
		});
		";
		
		return $DISP;
	}

	function addJqueryPersen2($modelName,$marginName){
		$DISP = "
			$('#".$modelName."_".$marginName."').val($('#".$modelName."_MarginFuelCost').val());
			$('#".$modelName."_".$marginName."').trigger('blur');
		";

		return $DISP;
	}

	function addJqueryPersengpstd($modelName,$marginName){
		$DISP = "
			$('#gpStd').val($('#".$modelName."_".$marginName."').val());
			$('#gpStd').trigger('change');
		";

		return $DISP;
	}

	function addJqueryPersenontotal($modelName,$salesName,$marginName){
		$DISP = "$('#".$salesName."').keyup(function () {  
			  // setiap karakter yang diketik selain angka akan langsung dihapus   
			  //this.value = this.value.replace(/[^0-9\.\-]/g,'');
			  formatangka(this);
			  replaceChars(this.value,'".$marginName."Count');
			  calculateTotalCost();
			});
			
		";
		
		$DISP .="
		$('#".$salesName."').change(function () {  
			
		});
		";

		return $DISP;
	}

?>


<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
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

<?php
/*
 		$('#gpStd').blur(function () {  

			 if(this.value==''){
			 	this.value=0;
			 }

			var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
			var contsVal= parseFloat(totalCostCountNotFormatedStd) ;
			var percentCount = parseFloat(( this.value * contsVal ) / 100);
			var resultCount = contsVal  + percentCount;
			var formatedCount =formatcurrencynya(resultCount);
			var costperMt = parseFloat(resultCount) / $('#Quantity').val();
			var costperMtFormated=formatcurrencynya(costperMt);
			$('#TotalCostStd').val(formatedCount);
			$('#TotalCostStdinput').val(resultCount);

			$('#costPerMtStd').val(costperMtFormated);

			$('#price').val(costperMt); // tambahan
			$('#priceFormated').val(costperMtFormated); // tambahan


			// update margin sesuai dengan gpstd 

			<?php echo addJqueryPersen2Fuel(SalesPlanDB::selectModel($is_mode),'MarginFuelCost') ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginAgencyCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginDepreciationCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginCrewCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginSubconCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginIncuranceCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginRepairCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginDockingCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginBrokerageCost'); ?>
			<?php echo addJqueryPersen2(SalesPlanDB::selectModel($is_mode), 'MarginOthersCost'); ?>
			

			// hitung ulang gpstd
			<?php echo addJqueryPersengpstd(SalesPlanDB::selectModel($is_mode), 'MarginOthersCost'); ?>
			
			//calculatePercentage();


			//alert(cost);
		});

		// on change 
		$('#gpStd').change(function () {  
			
			var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
			var contsVal= parseFloat(totalCostCountNotFormatedStd) ;
			var percentCount = parseFloat(( this.value * contsVal ) / 100);
			var resultCount = contsVal  + percentCount;
			var formatedCount =formatcurrencynya(resultCount);
			var costperMt = parseFloat(resultCount) / $('#Quantity').val();
			var costperMtFormated=formatcurrencynya(costperMt);
			$('#TotalCostStd').val(formatedCount);
			$('#TotalCostStdinput').val(resultCount);

			$('#costPerMtStd').val(costperMtFormated);

			$('#price').val(costperMt); // tambahan
			$('#priceFormated').val(costperMtFormated); // tambahan
		});
		
		$('#Quantity').blur(function () {  

			     if(this.value==''){
			      this.value=0;
			     }

		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var costperMt = parseFloat(totalCostCountNotFormatedStd) / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtStd').val(costperMtFormated);

		var totalCostCountSalesNotFormated=totalCostCount()['totalnotFormated'];
		var costperMtSales=parseFloat(totalCostCountSalesNotFormated) / $('#Quantity').val();
		var costperMtSalesFormated=formatcurrencynya(costperMtSales);
		$('#costPerMtSales').val(costperMtSalesFormated);

		});


*/
?>
<body onload="firstUpload();">