
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
	echo '<h3>Period : '.Timeanddate::getShortMonthIndo($month).' '.$year.'</h3>';
	
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 style="width:3000px;">
	<tr>
		<th width=10% colspan=5 style="text-align: center" bgcolor="#1A354F"> TUG & BARGE</th>
		<th width=5% colspan=2 style="text-align:center" bgcolor="#1A354F">  </th>
		<th width=15% colspan=9 style="text-align: center" bgcolor="#1A354F"> SALES PLAN </th>
		<th width=30% colspan=11 style="text-align: center" bgcolor="#1A354F"> STANDARD COST </th>
		<th width=40% colspan=24 style="text-align: center" bgcolor="#1A354F"> SALES COST </th>
	 <!--   <th width=10% colspan=2 style="text-align: center" bgcolor="#1A354F"> GP </th> -->
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
		<td  align="center" bgcolor="#C7F2F2">Total Revenue</td>
		<td  align="center" bgcolor="#C7F2F2">Fuel (Ltr) </td> 	
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
	
	<!--	<td  align="center" bgcolor="#C7F2F2">Amount</td> -->
	<!--	<td  align="center" bgcolor="#C7F2F2">Margin</td> -->

			';		


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
		<td align="center" bgcolor="#C7F2F2">Freight Cost</td>
		<td align="center" bgcolor="#C7F2F2">Margin</td>

		<!--<td align="center" bgcolor="#C7F2F2">Amount</td> -->
		<!--<td align="center" bgcolor="#C7F2F2">Margin</td> -->
		';
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
				//echo SalesPlanViewer::displayDeletedVessel($data->tug);
				//continue;
				$id_vessel_tug = $data->tug;
			}
			
			if(isset($data->VesselBarge)){
				$id_vessel_barge = $data->VesselBarge->id_vessel;
			}else{
				$id_vessel_barge = $data->barge;
				//echo SalesPlanViewer::displayDeletedVessel($data->barge);
				//continue;
			}
			
			if(isset($is_mode))
				$listdata = SalesPlanDB::getSalesPlanByTimeAndVessel($id_vessel_tug, $id_vessel_barge, $month, $year, $is_mode);
			else
				$listdata = SalesPlanDB::getSalesPlanByTimeAndVessel($id_vessel_tug, $id_vessel_barge, $month, $year);
			
			//Ini display untuk per row jadwal sales plan
			//Dipecah (refactor) agar tidak terlalu panjang
			SalesPlanViewer::displayRowPerVessel($listdata, $data, $no, $month, $year, $is_mode, $mode, $this);
			
			//Menampilkan pasangan pair yang telah mengalami unbreak
			if(!isset($is_mode)){
				$is_mode = "salesplan";
			}
			$listdata2 = SalesPlanDB::getSalesPlanByTimeAndVesselException($id_vessel_tug, $id_vessel_barge, $month, $year, $is_mode);
			$numlistdata2 = count($listdata2);
			if($numlistdata2 > 0){
				SalesPlanViewer::displayRowPerVessel($listdata2, $data, $no, $month, $year, $is_mode, $mode, $this, "optional");
			}
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
    if(confirm("Are you sure you want to delete this record?")){
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



<?php

if($mode=="current"){
$urlnewpair = Yii::app()->createUrl("salesplan/addsalesplanselectvessel", array('month'=>$month, 'year'=>$year));
$this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add New Pair'),
                'icon'=>'plus white',
                'size'=>'Medium',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>$urlnewpair,
				'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                     
                                        ),
                ));
}


?>