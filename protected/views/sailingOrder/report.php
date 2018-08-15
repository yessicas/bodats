


<style>
body {
    width:800px; 
    font-family: "Calibri";
    font-size: 10px;
    /*color: #4F6B72;*/
    color: black;
    
}

.even .no_borderleft{
	border-left: 1px solid #fff !important;
	border-right: 1px solid #fff !important;
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}
</style>



<?php echo ReportViewDB::getlogoheader(); ?>


<h3 align="center" > Sailing Order </h3>
	<table class="tabel_border_o" width='100%'>

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
		<?php echo $model->Crew->CrewName; ?>
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
		echo $model->SailingOrderNumber;
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
		<?php echo $model->Date; ?>
		</td>
	</tr>

	</table>



	<div id="so" class="grid-view">
	<table class="items table table-bordered table-condensed" >
	<tbody>
	<tr class="even" >
	<td style="vertical-align:top;" >
		Harap melaksanakan pelayaran dengan detail sebagai berikut : <br>

		<table class="tabel_border_o" width='100%'>

		<tr>
		<td style="width:50px;;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:200px;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
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
		<?php echo $model->StartDate; ?>
		</td>
		
		</tr>


		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
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

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
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

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		STANDARD FUEL                               
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo NumberAndCurrency::formatNumber($model->StandardFuel); ?> Liter
		
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
		<?php echo $model->LayTime; ?> Hari
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
		<?php echo NumberAndCurrency::formatCurrency($model->Insentif); ?>
		</td>
		
		</tr>

		<tr>
		<td style="width:10%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft">
		
		</td>

		<td style="width:20%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		STOCK BBM                                                  
		</td>
		<td style="width:2%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft" >
		<?php echo NumberAndCurrency::formatNumber($model->LastFuelStock); ?>
		
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
		<?php echo $model->Remark; ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
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
<table class="tabel_border_o" width='100%'>
				<tr>

			<td width ='33%' style="text-align:center;">
<div align = 'center'>

Hormat Kami<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->Nautical; ?></u><br>
PIC Nautical
</div>

				<td width ='33%' style="text-align:center;">
<div align = 'center'>

Mengetahui<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->NauticalHead; ?></u><br>
Nautical Section Head
</div>

				</td>

				<td width ='33%' style="text-align:center;">
<div align = 'center'>

Menyetujui<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->Crew->CrewName; ?></u><br>
Master
</div>

				</td>






				

			
				

			</tr>
</table>

	

