

<style>

body {
    width:800px; 
    font-family: "Calibri";
    font-size: 12px;
    /*color: #4F6B72;*/
    color: black;
    
}

.even .no_borderleft{
	border-left: 1px solid #fff !important;
	border-right: 1px solid #fff !important;
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
	
}

.tabel_border_o .borderall{
	border-left: 1px solid #AAAAAA !important;
	border-right: 1px solid #AAAAAA !important;
	border-top: 1px solid #AAAAAA !important;
	border-bottom: 1px solid #AAAAAA !important;
	
}

.even .borderbottom{
	border-bottom: 1px solid #dddddd !important;
}

.even .noborderleft{
	border-right: 1px solid #fff !important;
}

/*
.dropdown:hover .dropdown-menu {
    display: block;
 }
*/

</style>

<?php echo ReportViewDB::getlogoheader(); ?>
<br>

<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;width:100%;">

	<tr>
		<td style="width:80%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
		</td>
		<td  class ="borderall" style="width:20%;vertical-align:middle;padding: 2px 0px;text-align:center;font-weight:bold;font-size:16px;color: black;background-color: #D8D8D8;border-color: #AAAAAA;">
		CLOSE VOYAGE REPORT
	    

		</td>
	</tr>
	</table>

<br>

<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;width:90%;" >

	<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Kepada   :
		</td>
		<td style="width:50%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo nl2br(GeneralDB::getsettingvoyage('Voyage Close Report To')->field_value); ?> 
		</td>
		<td style="width:40%;vertical-align:top;text-align:right;padding: 2px 0px;" >
		<!-- --> 
		<?php echo $model->CloseVoyageNumber; ?><br>
		<i>Referensi Nomer Sailing Order </i>:<br>
		<?php echo VoyageCloseDB::GetSailingOrderNumber($modelvoyage->id_voyage_order) ?><br>
		<?php echo $model->CloseVoyageReportDate ?>
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
<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;width:90%;">

	<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Kepada :
		</td>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		Master 
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		 : 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo CrewDB::getCrewNameMasterCrewByVessel2($modelvoyage->VesselTug->id_vessel); ?>
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

		<table class="tabel_border_o" style="width:80%;">

		<tr>
		<td style="width:100px;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		<font style="color:#fff;"></font>
		</td>

		<td style="width:200px;vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		ASAL                         
		</td>
		<td style="vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="width:350px;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $modelvoyage->JettyOrigin->JettyName ?>
		</td>
		
		</tr>


		<tr>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		TUJUAN                          
		</td>
		<td style="vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $modelvoyage->JettyDestination->JettyName ?>
		</td>
		
		</tr>



		<tr>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		Route                          
		</td>
		<td style="vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo $model->ActualRoute;  ?>
		</td>
		
		</tr>


		<tr>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="vertical-align:top;text-align:left;padding: 5px 0px;font-weight:bold;" class="no_borderleft" >
		Tanggal  Close                          
		</td>
		<td style="vertical-align:top;text-align:center;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php //echo $form->textField($model,'ActualEndDate',array('class'=>'span5')); ?>
		<?php echo $model->ActualEndDate ?>
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
					<td style="vertical-align:top;text-align:center;font-weight:bold;" colspan='3' >
					STANDARD
					</td>
					<td style="vertical-align:top;text-align:center;font-weight:bold;" colspan='3' >
					ACTUAL
					</td>
				</tr>

				<tr class="even" >
					<td style="vertical-align:top;text-align:left;font-weight:bold;" class="noborderleft">
					 FUEL 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="noborderleft" >
					:
					</td>
					<td style="vertical-align:top;text-align:left;" >
					<?php echo $model->StandardFuel; ?> Liter
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;"class="noborderleft" >
					 FUEL 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="noborderleft" >
					:
					</td>
					<td style="vertical-align:top;text-align:left;" >
					<?php echo $model->ActualFuel; ?> Liter
					</td>
				</tr>

				<tr class="even" >
					<td style="vertical-align:top;text-align:left;font-weight:bold;" class="noborderleft" >
					 VOYAGE TIME 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="noborderleft">
					:
					</td>
					<td style="vertical-align:top;text-align:left;" >
					<?php echo $model->StandardLayTime; ?> Hari 
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;" class="noborderleft">
					 VOYAGE TIME 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="noborderleft" >
					:
					</td>
					<td style="vertical-align:top;text-align:left;" >
					<?php $konversiminutetodays= round($model->ActualLayTime/(24*60),2); ?>
					<?php echo $konversiminutetodays ?> Hari
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
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Stock awal
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $model->StartFuelStock; ?>
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="width:5%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Standart pemakaian
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo StandardFuelDB::getStandardFuel($modelvoyage->BargingVesselTug,$modelvoyage->BargingVesselBarge,$modelvoyage->BargingJettyIdStart,$modelvoyage->BargingJettyIdEnd)->fuel ?>
					
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Kelebihan AE
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $model->AE_Over; ?>
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Bunker
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $model->Bunker; ?>
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Deviasi tujuan
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					 <?php echo $model->Deviation; ?>
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Sisa Stock
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $model->LastFuelStock; ?>
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					
					</td>
				</tr>

				<tr >
					<td style="width:26%;vertical-align:top;text-align:left;font-weight:bold;" class="no_borderleft">
					
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;"class="no_borderleft" >
					
					</td>
					<td style="width:10%;vertical-align:top;text-align:left;" class="no_borderleft">
					Standart BBM 100%
					</td>

					<td style="width:5%;vertical-align:top;text-align:right;font-weight:bold;" class="no_borderleft">
					  
					</td>
					<td style="width:20%;vertical-align:top;text-align:left;" class="no_borderleft">
					
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
	<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;" width='100%'>
				<tr>

			<td width ='33%' style='text-align:center;'>
<div align = center>

Hormat Kami<br>
<br>
<br>
<br>
<br>



<u><?php echo CrewDB::getCrewNameMasterCrewByVessel($modelvoyage->VesselTug->id_vessel); ?></u><br>
Master
</div>

				<td width ='33%' style='text-align:center;'>
<div align = center>

Menyetujui<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->Nautical; ?></u><br>
PIC Nautical
</div>

				</td>

				<td width ='33%' style='text-align:center;'>
<div align = center>

Mengetahui<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->NauticalHead; ?></u><br>
Nautical Section Head
</div>

				</td>			

			</tr>
</table>


















<?php /*$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_close',
		'CloseVoyageNumber',
		'CloseVoyageStatus',
		'CloseVoyageNo',
		'CloseVoyageMonth',
		'CloseVoyageYear',
		'id_voyage_order',
		'id_sailing_order',
		'ActualRoute',
		'CrewIdMaster',
		'CloseVoyageReportDate',
		'ActualStartDate',
		'ActualEndDate',
		'StandardFuel',
		'StandardLayTime',
		'ActualFuel',
		'ActualLayTime',
		'StartFuelStock',
		'Bunker',
		'LastFuelStock',
		'AE_Over',
		'Deviation',
		'Remark',
		'Nautical',
		'NauticalHead',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); */?>
