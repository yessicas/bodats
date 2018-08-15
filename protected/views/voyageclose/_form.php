
<?php 
 echo"<script type='text/javascript'>
 function hitung_fuel() 
 {
var startfuel = parseFloat($('#VoyageClose_StartFuelStock').val()); 
var lastfuel = parseFloat($('#VoyageClose_LastFuelStock').val()); 

if(startfuel < lastfuel  ){
	alert('Last stock Fuel  Cannot Higher  Than Start Fuel Stock');
	$('#VoyageClose_LastFuelStock').val('');
	$('#VoyageClose_ConsumptFuel').val('');
}else{
	var consuption = startfuel - lastfuel;
    $('#VoyageClose_ConsumptFuel').val(consuption);
}

}
 </script>";
?>

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


<?php 
 echo"<script type='text/javascript'>
 function hitung_durasi() 
 {

var strstart = $('#VoyageClose_ActualStartDate').val();
strstart = strstart.replace(/-/g,'/');
var start = new Date(strstart); 

var strend = $('#VoyageClose_ActualEndDate').val();
strend = strend.replace(/-/g,'/');
var end = new Date(strend); 

var diff = Math.abs(end - start); 
var days = diff/1000/60/60/24;
var minutes = diff/1000/60;
    


if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#VoyageClose_ActualEndDate').val('');
	$('#VoyageClose_ActualLayTime').val('');
	$('#dayslaytime').val('');
}else{
    $('#VoyageClose_ActualLayTime').val(minutes);
    $('#dayslaytime').val(days.toFixed(2));
}



}


 </script>";
?>

<style>
.even .no_borderleft{
	border-left: 1px solid #fff !important;
}

.even .borderbottom{
	border-bottom: 1px solid #dddddd !important;
}

/*
.dropdown:hover .dropdown-menu {
    display: block;
 }
*/

</style>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-close-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>


<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage'=>$modelvoyage)); ?>

<div class='view'>
<?php echo $form->textFieldRow($model,'ActualStartDate',array('class'=>'span3','value'=>VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($modelvoyage->id_voyage_order)->StartDate,'readonly'=>'readonly')); ?>

<div class="control-group ">
<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Closed Date'); ?> <span class="required">*</span></label> <!-- label -->
<div class="controls">
<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
		'model' => $model, // Your model
		'language'=>'id',
		'attribute' => 'ActualEndDate', // Attribute for input
		'options' => array(
				'showOn'=>'focus',
				'dateFormat'=>'yy-mm-dd',
				),
		'htmlOptions' => array(
				'style'=>'width:150px;', // styles to be applied
				'size' => '10',    // textField maxlength
				'onChange' => 'javascript:hitung_durasi()',
		),
		)); ?>
<?php echo $form->error($model,'ActualEndDate'); ?> <!-- error message -->
</div>
</div>

<div class="control-group ">
<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('ActualLayTime'); ?> <span class="required">*</span></label> <!-- label -->
<div class="controls">
<?php echo Chtml::textField('dayslaytime','',array('class'=>'span3','readonly'=>'readonly')); ?> days
<?php echo $form->hiddenField($model,'ActualLayTime',array('class'=>'span3')); ?> 
<?php echo $form->error($model,'ActualLayTime'); ?> <!-- error message -->
</div>
</div>

<div class="control-group ">
<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('StartFuelStock'); ?> <span class="required">*</span></label> <!-- label -->
<div class="controls">
<?php echo $form->textField($model,'StartFuelStock',array('class'=>'span3','value'=>VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($modelvoyage->id_voyage_order)->LastFuelStock,'readonly'=>'readonly')); ?> ltr
<?php echo $form->error($model,'StartFuelStock'); ?> <!-- error message -->
</div>
</div>

<div class="control-group ">
<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('LastFuelStock'); ?> <span class="required">*</span></label> <!-- label -->
<div class="controls">
<?php echo $form->textField($model,'LastFuelStock',array('class'=>'span3','onChange' => 'javascript:hitung_fuel()')); ?> ltr
<?php echo $form->error($model,'LastFuelStock'); ?> <!-- error message -->
</div>
</div>

<div class="control-group ">
<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Consumpt'); ?> <span class="required">*</span></label> <!-- label -->
<div class="controls">
<?php echo $form->textField($model,'ConsumptFuel',array('class'=>'span3','readonly'=>'readonly')); ?> ltr
<?php echo $form->error($model,'ConsumptFuel'); ?> <!-- error message -->
</div>
</div>


</div>




<?php /*

<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;">

	<tr>
		<td style="width:70%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
		</td>
		<td style="width:30%;vertical-align:top;text-align:right;padding: 2px 0px;">
		<?php 
	    echo'<div class="alert in alert-block fade alert-info" style="text-align:center;font-weight:bold;font-size:20px;color: black;background-color: #D8D8D8;border-color: #AAAAAA;">
	    CLOSE REPORT
	    </div>';
	    ?>

		</td>
	</tr>
	</table>

<br>
<br>

<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;width:90%;" >

	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Kepada   :
		</td>
		<td style="width:50%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo nl2br(GeneralDB::getsettingvoyage('Voyage Close Report To')->field_value); ?> 
		</td>
		<td style="width:40%;vertical-align:top;text-align:right;padding: 2px 0px;" >
		<!-- --> 
		<?php
		$dataformatnumber=NumberingDocumentDBVoyageClose::getFormatNumber($model,'id_voyage_close','CloseVoyageNo','CloseVoyageMonth','CloseVoyageYear');
		echo $form->textField($model,'CloseVoyageNumber',array('class'=>'span7','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'CloseVoyageNo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'CloseVoyageMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBVoyageClose::getMonthNow(),'readonly'=>'readonly')); 
		echo $form->hiddenField($model,'CloseVoyageYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBVoyageClose::getYearNow(),'readonly'=>'readonly')); 
		?>
		<br>
		<i>Referensi Nomer Sailing Order </i>:<br>
		<?php echo VoyageCloseDB::GetSailingOrderNumber($modelvoyage->id_voyage_order) ?><br>
		<?php 
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		'language'=>'id',
		'attribute'=>'CloseVoyageReportDate',
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
		<?php echo $form->error($model,'CloseVoyageReportDate'); ?> 
		</td>
	</tr>


	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
		</td>
		<td style="width:50%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<!-- -->  
		</td>
		<td style="width:40%;vertical-align:top;text-align:right;padding: 2px 0px;" >
		<?php //echo VoyageCloseDB::GetSailingOrderNumber($modelvoyage->id_voyage_order) ?>
		</td>
	</tr>

	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
		</td>
		<td style="width:50%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<!-- -->
		</td>
		<td style="width:40%;vertical-align:top;text-align:right;padding: 2px 0px;" >
		
		<?php 
		//$datesailingorder=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($modelvoyage->id_voyage_order)->Date ;
		//echo Yii::app()->dateFormatter->format("d MMMM y",strtotime($datesailingorder)); 
		?>
		
		</td>
	</tr>


	</table>


<br>
<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;">

	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Kepada :
		</td>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Master 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		 : 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo Chtml::textField('CrewName',CrewDB::getCrewNameMasterCrewByVessel($modelvoyage->VesselTug->id_vessel),array('class'=>'span5','readonly'=>'readonly')); ?>
		<?php echo $form->hiddenField($model,'CrewIdMaster',array('class'=>'span5','value'=>CrewDB::getIdMasterCrewByVessel($modelvoyage->VesselTug->id_vessel))); ?>
		<br>
		<?php echo $form->error($model,'CrewIdMaster'); ?> 
		</td>
		<td style="vertical-align:top;text-align:right;">

		</td>
	</tr>

	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
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
		</td>
	</tr>

	<tr>
		<td style="width:7%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		
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
		
		</td>
	</tr>

	</table>







	<div id="voyageclose" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>
	<tr class="even" >
	<td style="vertical-align:top;" >
		Berikut kami kirimkan Laporan Close Voyage :  <br>

		<table class="tabel_border_o">

		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		ASAL                         
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

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		TUJUAN                          
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

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		Route                          
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $form->textArea($model,'ActualRoute',array('rows'=>3, 'cols'=>50, 'class'=>'span7'));  ?>
		<br>
		<?php echo $form->error($model,'ActualRoute'); ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		Tanggal  Close                          
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php //echo $form->textField($model,'ActualEndDate',array('class'=>'span5')); ?>
		<?php 

		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		'language'=>'id',
		'attribute'=>'ActualEndDate',
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
		<?php echo $form->error($model,'ActualEndDate'); ?> 
		</td>
		
		</tr>




		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft"  colspan='3'>
		
				<div id="voyageclose"detail class="grid-view">
				<table class="items table table-bordered table-condensed" style="width:87%">
				<tbody>
				<tr class="even" >
					<td style="vertical-align:top;text-align:center;font-weight:bold;" colspan='3' class="borderbottom">
					STANDARD
					</td>
					<td style="vertical-align:top;text-align:center;font-weight:bold;" colspan='3' class="borderbottom">
					ACTUAL
					</td>
				</tr>

				<tr class="even" >
					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 FUEL 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					<?php echo $form->textField($model,'StandardFuel',array('class'=>'span5')); ?> Liter
					<br>
					<?php echo $form->error($model,'StandardFuel'); ?> 
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 FUEL 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					<?php echo $form->textField($model,'ActualFuel',array('class'=>'span5')); ?> Liter
					<br>
					<?php echo $form->error($model,'ActualFuel'); ?>
					</td>
				</tr>

				<tr class="even" >
					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 VOYAGE TIME 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					<?php echo $form->textField($model,'StandardLayTime',array('class'=>'span5')); ?> Hari 
					<br>
					<?php echo $form->error($model,'StandardLayTime'); ?>
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 VOYAGE TIME 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					<?php echo $form->textField($model,'ActualLayTime',array('class'=>'span5')); ?> Hari
					<br>
					<?php echo $form->error($model,'ActualLayTime'); ?>
					</td>
				</tr>

				</tbody>
				</table>
				</div>


		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft"  colspan='3'>
		
				<table class="tabel_border_o" style="width:85%">

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					Remarks *
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					:
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Stock awal
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $form->textField($model,'StartFuelStock',array('class'=>'span8')); ?>
					<br>
					<?php echo $form->error($model,'StartFuelStock'); ?>
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Standart pemakaian
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					 9600 xxx
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Kelebihan AE
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $form->textField($model,'AE_Over',array('class'=>'span8')); ?>
					<br>
					<?php echo $form->error($model,'AE_Over'); ?>
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Bunker
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $form->textField($model,'Bunker',array('class'=>'span8')); ?>
					<br>
					<?php echo $form->error($model,'Bunker'); ?>
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Deviasi tujuan
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					 <?php echo $form->textField($model,'Deviation',array('class'=>'span8')); ?>
					 <br>
					<?php echo $form->error($model,'Deviation'); ?>
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Sisa Stock
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $form->textField($model,'LastFuelStock',array('class'=>'span8')); ?>
					<br>
					<?php echo $form->error($model,'LastFuelStock'); ?>
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Standart BBM 100%
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;font-weight:bold;" class="no_borderleft">
					  
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				</table>

		</td>
		
		</tr>


		</table>

	<br>
	<br>
	<i>* : Harap diisikan jika ada deviasi dari standard</i>
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



<u><?php echo Chtml::textField('master','',array('class'=>'span8','maxlength'=>150,'readonly'=>'readonly')); ?></u><br>
Master
</div>

				<td width ='33%'>
<div align = center>

Menyetujui<br>
<br>
<br>
<br>
<br>



<u><?php echo $form->textField($model,'Nautical',array('class'=>'span5','maxlength'=>150,'style'=>'margin-bottom:0px;','value'=>VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($modelvoyage->id_voyage_order)->Nautical)); ?><br>
<?php echo $form->error($model,'Nautical'); ?> </u><br>
PIC Nautical
</div>

				</td>

				<td width ='33%'>
<div align = center>

Mengetahui<br>
<br>
<br>
<br>
<br>



<u><?php echo $form->textField($model,'NauticalHead',array('class'=>'span5','maxlength'=>150,'style'=>'margin-bottom:0px;','value'=>VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($modelvoyage->id_voyage_order)->NauticalHead)); ?><br>
<?php echo $form->error($model,'NauticalHead'); ?> </u><br>
Nautical Section Head
</div>

				</td>			

			</tr>
</table>
















	<br>
	<br>
	<br>

*/ ?>

	<?php //echo $form->textFieldRow($model,'CloseVoyageStatus',array('class'=>'span5','maxlength'=>0)); ?>

	<?php /*
		<?php echo $form->textFieldRow($model,'CloseVoyageNumber',array('class'=>'span5','maxlength'=>64,'value'=>VoyageCloseDB::GetSailingOrderNumber($modelvoyage->id_voyage_order))); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageNo',array('class'=>'span5','value'=>VoyageCloseDB::GetSailingOrderNo($modelvoyage->id_voyage_order))); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageMonth',array('class'=>'span5','value'=>VoyageCloseDB::GetSailingOrderMonth($modelvoyage->id_voyage_order))); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageYear',array('class'=>'span5','value'=>VoyageCloseDB::GetSailingOrderYear($modelvoyage->id_voyage_order))); ?>
		*/
	?>

	<?php echo $form->hiddenField($model,'id_sailing_order',array('class'=>'span5','maxlength'=>20,'value'=>VoyageCloseDB::Getid_sailing_order($modelvoyage->id_voyage_order))); ?>




	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textAreaRow($model,'ActualRoute',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); // dipakai ?>

	<?php //echo $form->textFieldRow($model,'CrewIdMaster',array('class'=>'span5')); // dupakai ?>

	<?php //echo $form->textFieldRow($model,'CloseVoyageReportDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualStartDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualEndDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StandardFuel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StandardLayTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualFuel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualLayTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StartFuelStock',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Bunker',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'LastFuelStock',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'AE_Over',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Deviation',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'Remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'Nautical',array('class'=>'span5','maxlength'=>150)); // dipakai ?>

	<?php //echo $form->textFieldRow($model,'NauticalHead',array('class'=>'span5','maxlength'=>150)); // dipakai ?>

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



