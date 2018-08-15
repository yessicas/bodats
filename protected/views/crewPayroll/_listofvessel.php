<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 12px;
	font-family: Arial;
	font-weight: normal;
}

th {
  font-weight: bold;
  color:white;
}

td{
  color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

[class^="icon-"], [class*=" icon-"] {

    margin: 1px 0px -1px 0px;
}

#alignright{
	 text-align: right;
}

</style>

<?php

		//$id_tug = $_GET['Tug'];
		$vessel = VesselDB::getVessel($id_tug);
		echo '<h2>Crew of '.$vessel->VesselName.'</h2>';
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
	<th  align="center" bgcolor="#1A354F"> Position </th>
	<th  align="center" bgcolor="#1A354F" > Crew Name </th>
	<th  align="center" bgcolor="#1A354F" > Status </th>
	<th  align="center" bgcolor="#1A354F"> Certificate </th>
	<?php
	//$PAYROLLITEM = PayrollDB::getListPayrollitem();
	$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
	$LIST_PAYROLL_ITEM = array();
	$TOTAL_PAYROLL = array();
	$i=0;
	foreach($PAYROLLITEM as $payitem){
		$i++;
		echo '<th  align="center" bgcolor="#1A354F">'.$payitem->payroll_item.'</th>';
		$LIST_PAYROLL_ITEM[$i] = $payitem->id_payroll_item;
		$TOTAL_PAYROLL[$payitem->id_payroll_item] = 0;
	}	
	?>
	<th  align="center" bgcolor="#1A354F" > Total </th>
	<th  align="center" bgcolor="#1A354F" > Action </th>
</tr>

<?php
	$LISTPOSITION = CrewDB::getListCrewPosition();
	$LISTASSIGNMENT = CrewDB::getListCrewAssignmentByVessel($id_tug);
	
	foreach($LISTASSIGNMENT as $crew_assign){
		$crewas[$crew_assign->id_crew_position] = $crew_assign;
	}	
	
	$TOTAL_ALL_CREW = 0;
	foreach($LISTPOSITION as $position){
		echo '
		<tr>   
		  <td>'.$position->crew_position.'</td>';
		
		if(isset($crewas[$position->id_crew_position])){
			$cr = $crewas[$position->id_crew_position];
			$LISTCREWPAYROLL = PayrollDB::getListCrewPayroll($cr->CrewId);
			$LISTAMOUNT = array();
			$currency='';
			foreach($LISTCREWPAYROLL as $amount){
				$LISTAMOUNT[$amount->id_payroll_item] = $amount->amount;
				$currency=$amount->Currency->currency;
			}
			$url = Yii::app()->createUrl("crewPayroll/addpayroll", array('CrewId'=>$cr->CrewId, 'id_tug'=>$id_tug));
			$cerlevel = isset($cr->crew->certificate_level)? $cr->crew->certificate_level->certiface_level : "-";
			echo '
				<td>'.$cr->crew->CrewName.'</td>
				<td>'.$cr->crew->StatusOwn.'</td>
				<td>'.$cerlevel.'</td>';
			$TOTAL_ROW = 0;
			foreach ($LIST_PAYROLL_ITEM as $item){
				if(isset($LISTAMOUNT[$item])){
					$amount = $LISTAMOUNT[$item];
					$TOTAL_ROW += $amount;
					
					echo '<td style="text-align:right">'.$currency.'. '.NumberAndCurrency::formatCurrency($amount).'</td>';
					$TOTAL_PAYROLL[$item] += $amount;
				}else{
					echo '<td style="text-align:right"> 0 </td>';
				}
			}
			$TOTAL_ALL_CREW += $TOTAL_ROW;
			
			echo '<td style="text-align:right">'.$currency.'. '.NumberAndCurrency::formatCurrency($TOTAL_ROW).'</td>';
			echo '
				<td style="vertical-align:middle;">
					<a href="'.$url.'" class="various fancybox.ajax" style="font-size:12px;"><u>Update Fixed Payroll</u></a>
				</td>

			';
		}else{
			$url = Yii::app()->createUrl("cre/sign", array('id_tug'=>$id_tug));
			echo '
				<td style="font-style: italic;">Crew not available.<br><a href="'.$url.'">Assign Crew</a></td>	
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				
				
				';
		}
		echo '
		</tr>
		';
	}
	
	//TOTAL RESUME
	echo '
		<td colspan="4"> TOTAL </td>';
	foreach ($LIST_PAYROLL_ITEM as $item){
		echo '<td style="text-align:right; font-weight: bold"><b>'.NumberAndCurrency::formatCurrency($TOTAL_PAYROLL[$item]).'</b></td>';
	}
	echo '
		<td style="text-align:right; font-weight: bold;"><b>'.NumberAndCurrency::formatCurrency($TOTAL_ALL_CREW).'</b></td>
		<td></td>
		';
?>

<?php
/*
<tr>
  <td> Master </td>
  <td> Alex Widodo </td>
  <td> OWN </td>
  <td> ANT-IV </td>
  <td bgcolor="#7AEF46"> ON (1) </td>
  <td bgcolor="#7AEF46"> ON (2) </td>
  <td bgcolor="#7AEF46"> ON (3) </td>
  <td bgcolor="#7AEF46"> ON (4) </td>
  <td bgcolor="#7AEF46"> ON (5) </td>
  <td bgcolor="#7AEF46"> ON (6) </td>
  <td width=8% bgcolor="Red"> Off<br> Sign Off Date: <?php echo date("d-m-Y"); ?> Until <?php echo date("d-m-Y"); ?> </td>
  <td width=8% bgcolor="#7AEF46"> ON(1) <br> Sign Off Date: <?php echo date("d-m-Y"); ?> Until <?php echo date("d-m-Y"); ?> </td>
  <td bgcolor="#7AEF46"> ON (2) </td>
  <td bgcolor="#7AEF46"> ON (3) </td>
  <td style="vertical-align:middle;">

  <h5> <a href="CrewAssignment/signoff" class="various fancybox.ajax" style="font-size:12px;">  set off  </a>
    </td>
</tr>

  <tr>

     <td> Master </td>
  <td width=10%> Bambang Dwi Cahyono </td>
  <td> Relief </td>
  <td> ANT-IV </td>
  <td bgcolor="Red"> OFF (1) </td>
  <td bgcolor="Red"> OFF (2) </td>
  <td bgcolor="Red"> OFF (3) </td>
  <td bgcolor="Red"> OFF (4) </td>
  <td bgcolor="Red"> OFF (5) </td>
  <td bgcolor="Red"> OFF (6) </td>
  <td bgcolor="#7AEF46"> ON (1) </td>
  <td bgcolor="Red"> OFF </td>
  <td bgcolor="Red"> OFF </td>
  <td bgcolor="Red"> OFF </td>
  <td style="vertical-align:middle;">

  <h5> <a href="CrewAssignment/signon" class="various fancybox.ajax" style="font-size:12px;">  SET ON  </a>
    </td>
  </tr>
*/
?>



</table>

<?

?>