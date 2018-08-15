<?php
	echo '<h3>Period : '.Timeanddate::getShortMonthIndo($month).' '.$year.'</h3>';
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
	<tr>
		<th width=20% colspan=4 align="center" bgcolor="#1A354F"> TUG & BARGE </th>
		<th width=35% colspan=9 align="center" bgcolor="#1A354F"> SALES PLAN </th>
		<th width=35% colspan=13 align="center" bgcolor="#1A354F"> COST </th>
		<th width=10% colspan=2 align="center" bgcolor="#1A354F"> GP </th>
	</tr>

	<tr>
		<td width=1% align="center" bgcolor="#C7F2F2">No. </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Tug </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Barge </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Voyage Name </td>


		<td width=1% align="center" bgcolor="#C7F2F2">No. </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Customer </td>
		<td width=10% align="center" bgcolor="#C7F2F2">Loading </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Discharge </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Voy</td>
		<td width=1% align="center" bgcolor="#C7F2F2">Ton</td>
		<td width=8% align="center" bgcolor="#C7F2F2">USD/ Ton</td>
		<td width=8% align="center" bgcolor="#C7F2F2">Amount </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Total Revenue</td>

		<td width=1% align="center" bgcolor="#C7F2F2">Fuel (Ltr) </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Fuel Cost </td>
		<td width=8% align="center" bgcolor="#C7F2F2">Agency </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Depreciation</td>
		<td width=1% align="center" bgcolor="#C7F2F2">Crew Cost</td>
		<td width=8% align="center" bgcolor="#C7F2F2">Rent</td>
		<td width=8% align="center" bgcolor="#C7F2F2">Sub Cont </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Insurance</td>
		<td width=3% align="center" bgcolor="#C7F2F2">Repair & Maintain</td>
		<td width=1% align="center" bgcolor="#C7F2F2">Docking</td>
		<td width=8% align="center" bgcolor="#C7F2F2">Brokerage fee</td>
		<td width=8% align="center" bgcolor="#C7F2F2">Others </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Total Cost</td>

		<td width=8% align="center" bgcolor="#C7F2F2">Amount </td>
		<td width=3% align="center" bgcolor="#C7F2F2">Margin</td>
	</tr>


	<?php
		//Baca Tabel Set Type dan Barge
		$LIST_TUG_BARGE = SetTypeDB::getListAllTugBargeCurrent();
		$no = 0;
		foreach ($LIST_TUG_BARGE as $data){
			$no++;
			//echo $data->VesselTug->VesselName;
			//echo $data->VesselBarge->VesselName;
			//echo $data->voyage_number;
			
			$rowspanSetType = 3;
			echo '<tr>';
			echo '<td width="20%" rowspan="'.$rowspanSetType.'" align="center" > '.$no.'. </td>';
			echo '<td width="35%" rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselTug->VesselName.' </td>';
			echo '<td width="35%" rowspan="'.$rowspanSetType.'" align="center" > '.$data->VesselBarge->VesselName.' </td>';
			echo '<td width="10%" rowspan="'.$rowspanSetType.'" align="center" > '.$data->voyage_number.' </td>';
			echo '</tr>';
			
			//Button Add Sales Plan
			$url = Yii::app()->createUrl("salesplan/addsalesplan", array('id_tug'=>$data->tug, 'id_barge'=>$data->barge, 'month'=>$month, 'year'=>$year));
			echo '
			<tr>
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
			echo '
			<td colspan="20" >
            </td>
			</tr>';
			
			//Summary
			echo '
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

				</tr>';
				
		}
	?>
	
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




