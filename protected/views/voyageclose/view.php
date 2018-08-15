<?php
$this->breadcrumbs=array(
	'Voyage Closes'=>array('index'),
	$model->id_voyage_close,
);

$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
//array('label'=>'Create VoyageClose','url'=>array('create')),
array('label'=>'View Voyage Close','url'=>array('voyageclose/view','id'=>$model->id_voyage_order)),
array('label'=>'Update Voyage Close','url'=>array('voyageclose/update','id'=>$model->id_voyage_order)),
//array('label'=>'Delete VoyageClose','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_close),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

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

<div id="content">
<h2>View  Voyage Close <?php //echo $model->id_voyage_close; ?></h2>
<hr>
</div>


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


<table class="tabel_border_o" style =" font-family: 'Calibri';font-size: 12px;">

	<tr>
		<td style="width:70%;vertical-align:top;text-align:left;padding: 2px 0px;" >
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
		</td>
		<td style="width:30%;vertical-align:top;text-align:right;padding: 2px 0px;">
		<?php 
	    echo'<div class="alert in alert-block fade alert-info" style="text-align:center;font-weight:bold;font-size:20px;color: black;background-color: #D8D8D8;border-color: #AAAAAA;">
	    CLOSE VOYAGE <br> REPORT
	    </div>';
	    ?>

		</td>
	</tr>
	</table>

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
		<?php echo $model->ActualRoute;  ?>
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
					<?php echo $model->StandardFuel; ?> Liter
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 FUEL 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
					<?php echo $model->ActualFuel; ?> Liter
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
					<?php echo $model->StandardLayTime; ?> Hari 
					</td>

					<td style="vertical-align:top;text-align:left;font-weight:bold;" >
					 VOYAGE TIME 
					</td>
					<td style="width:2%;vertical-align:top;text-align:left;" class="no_borderleft">
					:
					</td>
					<td style="vertical-align:top;text-align:left;" class="no_borderleft">
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
					<td style="width:25%;vertical-align:top;text-align:left;" class="no_borderleft">
					Stock awal
					</td>

					<td style="width:20%;vertical-align:top;text-align:right;" class="no_borderleft">
					<?php echo $model->StartFuelStock; ?>
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
					<?php echo StandardFuelDB::getStandardFuel($modelvoyage->BargingVesselTug,$modelvoyage->BargingVesselBarge,$modelvoyage->BargingJettyIdStart,$modelvoyage->BargingJettyIdEnd)->fuel ?>
					
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
					<?php echo $model->AE_Over; ?>
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
					<?php echo $model->Bunker; ?>
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
					 <?php echo $model->Deviation; ?>
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
					<?php echo $model->LastFuelStock; ?>
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



<u><?php echo CrewDB::getCrewNameMasterCrewByVessel2($modelvoyage->VesselTug->id_vessel); ?></u><br>
Master
</div>

				<td width ='33%'>
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

				<td width ='33%'>
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







<br>
<br>
<br>
<?php

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('voyageclose/report','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('voyageclose/viewreport','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


?>












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
