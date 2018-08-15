<?php
	$this->breadcrumbs=array(
		'Sailing Orders'=>array('index'),
		$model->id_sailing_order,
	);

	/*
	$this->menu=array(
	array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
	array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
	array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
	array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
	);
	*/
	
	VoyageOrderDisplayer::displayTabLabelSailingOrder($this,3,"View Sailing Order");
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
<h2>View Sailing Order</h2>
<hr>
</div>
<?php 
/*
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_sailing_order',
		'SailingOrderNumber',
		'SailingOrderNo',
		'SailingOrderMonth',
		'SailingOrderYear',
		'id_voyage_order',
		'CrewIdMaster',
		'Period',
		'StartDate',
		'StandardFuel',
		'LayTime',
		'Insentif',
		'LastFuelStock',
		'Remark',
		'Nautical',
		'NauticalHead',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); 
*/
?>





<style>
.even .no_borderleft{
	border-left: 1px solid #fff !important;
}
</style>



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
<table  class = 'tabel_border_o' style =" font-family: 'Calibri';font-size: 12px;">
				<tr>

			<td width ='33%'>
<div align = center>

Hormat Kami<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->Nautical; ?></u><br>
PIC Nautical
</div>

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

				<td width ='33%'>
<div align = center>

Mennyetujui<br>
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

	



<?php

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('sailingorder/report','id'=>$model->id_voyage_order),
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
                        'url'=>array('sailingorder/viewreport','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


?>


