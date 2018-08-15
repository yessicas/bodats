<?php 
Yii::app()->clientScript->registerScript('search', "
  $('#SailingOrder_CrewIdMaster').keyup(function(){
  	//alert('ok');
  	var master = $('#SailingOrder_CrewIdMaster').val();
  	$('#master').val(master);
});


$(document).ready(function(){

	var master = $('#CrewName').val();
  	$('#master').val(master);

});
");
?>

<style>
.even .no_borderleft{
	border-left: 1px solid #fff !important;
}

/*
.dropdown:hover .dropdown-menu {
    display: block;
 }
*/

</style>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sailing-order-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<h3 align="center" > Sailing Order </h3>
	<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;">

	<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Kepada  :
		</td>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Master 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		 : 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php 
		if(isset($modelvoyage->VesselTug)){
			$masterName = CrewDB::getCrewNameMasterCrewByVessel2($modelvoyage->VesselTug->id_vessel);
			$masterID = CrewDB::getIdMasterCrewByVessel2($modelvoyage->VesselTug->id_vessel);
		}else{
			$masterName = "UNKNOWN - TUG NOT DEFINED";
		}
		echo Chtml::textField('CrewName',$masterName,array('class'=>'span7','readonly'=>'readonly')); ?>
		<?php echo $form->hiddenField($model,'CrewIdMaster',array('class'=>'span5','value'=>$masterID)); ?>
		<br>
		<?php echo $form->error($model,'CrewIdMaster'); ?> 
		</td>
		<td style="vertical-align:top;text-align:right;">

		</td>
	</tr>

	<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		Tug Boat 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		:
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo $modelvoyage->VesselTug->VesselName ?>
		</td>
		<td style="vertical-align:top;text-align:right;padding: 2px 0px;">
		<?php
		//$dataformatnumber=NumberingDocumentDBSailingOrder::getFormatNumber($model,'id_sailing_order','SailingOrderNo','SailingOrderMonth','SailingOrderYear');
		//echo $form->textField($model,'SailingOrderNumber',array('class'=>'span7','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		?>
		</td>
	</tr>

	<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		Barge 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		:
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo $modelvoyage->VesselBarge->VesselName ?>
		</td>
		<td style="vertical-align:top;text-align:right;padding: 2px 0px;">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		'language'=>'id',
		'attribute'=>'Date',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'style'=>'width:80px;',
		'value'=>date("Y-m-d")),
		)); ?>	
		<br>
		<?php echo $form->error($model,'Date'); ?> 
		</td>
	</tr>

	</table>


	<?php

		//echo $form->textField($model,'SailingOrderNumber',array('class'=>'span3','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
	
		//echo $form->hiddenField($model,'SailingOrderNo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SailingOrderMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSailingOrder::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SailingOrderYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSailingOrder::getYearNow(),'readonly'=>'readonly')); 
	?>

	<div id="so" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>
	<tr class="even" >
	<td style="vertical-align:top;" >
		Harap melaksanakan pelayaran dengan detail sebagai berikut : <br>

		<table class="tabel_border_o">

		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		NO VOYAGE  
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $modelvoyage->VoyageNumber ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		TANGGAL START/JAM 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
		'model' => $model, // Your model
		'language'=>'id',
		'attribute' => 'StartDate', // Attribute for input
		'options' => array(
				'showOn'=>'focus',
				'dateFormat'=>'yy-mm-dd',
				),
		'htmlOptions' => array(
				'style'=>'width:150px;', // styles to be applied
				'size' => '10',    // textField maxlength
				'value'=>$modelvoyage->StartDate,
		),
		)); ?>
		<br>
		<?php echo $form->error($model,'StartDate'); ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		LOADING                         
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $modelvoyage->JettyOrigin->JettyName ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		DISCHARGE                          
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $modelvoyage->JettyDestination->JettyName ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		STANDARD FUEL                               
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textField($model,'StandardFuel',array('class'=>'span5','value'=>StandardFuelDB::getStandardFuel($modelvoyage->BargingVesselTug,$modelvoyage->BargingVesselBarge,$modelvoyage->BargingJettyIdStart,$modelvoyage->BargingJettyIdEnd)->fuel )); ?>
		<br>
		<?php echo $form->error($model,'StandardFuel'); ?>
		</td>
		
		</tr>

		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		LAYTIME                                                 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textField($model,'LayTime',array('class'=>'span5','value'=>StandardFuelDB::getStandardFuel($modelvoyage->BargingVesselTug,$modelvoyage->BargingVesselBarge,$modelvoyage->BargingJettyIdStart,$modelvoyage->BargingJettyIdEnd)->cycle_time)); ?>
		<br>
		<?php echo $form->error($model,'LayTime'); ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		INSENTIF FORMULA                                                
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php 
			$standard_jarak = StandardFuelDB::getStandardFuel($modelvoyage->BargingVesselTug,$modelvoyage->BargingVesselBarge,$modelvoyage->BargingJettyIdStart,$modelvoyage->BargingJettyIdEnd)->jarak;
			$standard_nautical = StandardNauticalDB::getNauticalIncentifStandard();
			if($model->isNewRecord){
				$model->NauticalMilIncentive = $standard_jarak;
				$model->Insentif = $standard_jarak*$standard_nautical;
			}
		?>
		<?php echo $form->textField($model,'NauticalMilIncentive',array('class'=>'span3')); ?> (NAUTICAL MILE ) x <?php echo CHtml::textField('NauticalStandardIncentive', $standard_nautical,
		array('id'=>'NauticalStandardIncentive', 'class'=>'span3', 'maxlength'=>20, 'readonly'=>'readonly'));
	   ?> (Standard)
		<br>
		<?php echo $form->error($model,'NauticalMilIncentive'); ?>
		</td>
	
		</tr>
		
		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		INSENTIF                                                 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textField($model,'Insentif',array('class'=>'span5', 'readonly'=>'readonly')); ?>
		<br>
		<?php echo $form->error($model,'Insentif'); ?>
		</td>
	
		</tr>
		
		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		CURRENT STOCK BBM (ROB)                                                 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textField($model,'LastFuelStock',array('class'=>'span5')); ?>
		<br>
		<?php echo $form->error($model,'LastFuelStock'); ?>
		</td>
		
		</tr>

		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		REMARK                                                   
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textArea($model,'Remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		<br>
		<?php echo $form->error($model,'Remark'); ?> 
		</td>
		
		</tr>


		</table>


	</td>
	</tr>
	</tbody>
	</table>
	</div>
	
<br>
<br>
<table  class = 'tabel_border_o' style =" font-family: 'Calibri';font-size: 12px;">
				<tr>

			<td width ='33%'>
<div align = center>

Hormat Kami<br>
<br>
<br>
<br>
<br>



<u><?php echo $form->textField($model,'Nautical',array('class'=>'span5','maxlength'=>150, 'value'=>GeneralDB::getsettingvoyage('PIC Nautical')->field_value)); ?></u><br>
<?php echo $form->error($model,'Nautical'); ?> <br>
PIC Nautical
</div>

				<td width ='33%'>
<div align = center>

Mengetahui<br>
<br>
<br>
<br>
<br>



<u><?php echo $form->textField($model,'NauticalHead',array('class'=>'span5','maxlength'=>150,'value'=>GeneralDB::getsettingvoyage('Nautical Section Head')->field_value)); ?></u><br>
<?php echo $form->error($model,'NauticalHead'); ?> <br>
Nautical Section Head
</div>

				</td>

				<td width ='33%'>
<div align = center>

Menyetujui<br>
<br>
<br>
<br>
<br>



<u><?php echo Chtml::textField('master',$masterName,array('class'=>'span7','maxlength'=>150,'readonly'=>'readonly')); ?></u><br>
<br>
Master
</div>

				</td>		

			</tr>
</table>

	<?php //echo $form->textFieldRow($model,'SailingOrderNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'SailingOrderNo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SailingOrderMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SailingOrderYear',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'CrewIdMaster',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Date',array('class'=>'Date')); ?>

	<?php // echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StandardFuel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'LayTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Insentif',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'LastFuelStock',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'Remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'Nautical',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'NauticalHead',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>


<script>

	
	$('#SailingOrder_NauticalMilIncentive').blur(function () {  
		var nautical = parseFloat(this.value);
		var standard = $('#NauticalStandardIncentive').val();
		var incentive = nautical * standard;
		$('#SailingOrder_Insentif').val(incentive);
	});
	
	$('#SailingOrder_NauticalMilIncentive').change(function () {  
		var nautical = parseFloat(this.value);
		var standard = $('#NauticalStandardIncentive').val();
		var incentive = nautical * standard;
		$('#SailingOrder_Insentif').val(incentive);
	});

</script>