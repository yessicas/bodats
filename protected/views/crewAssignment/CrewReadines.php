<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 12px;
	font-family: Arial;
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

</style>

<?php

		//$id_tug = $_GET['Tug'];
		$vessel = VesselDB::getVessel($id_tug);
		echo '<h2>Crew of '.$vessel->VesselName.'</h2>';
?>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
	<th  align="center" bgcolor="#1A354F"> Position </th>
	<th  align="center" bgcolor="#1A354F"> Status </th>
	<th  align="center" bgcolor="#1A354F" > Crew Name </th>
	<th  align="center" bgcolor="#1A354F" > Status </th>
	<th  align="center" bgcolor="#1A354F"> Certificate </th>
	<th  align="center" bgcolor="#1A354F" > Start Date </th>
	<th  align="center" bgcolor="#1A354F" > End Until </th>
	<th  align="center" bgcolor="#1A354F" > Current Work Duration </th>
</tr>

<?php
	$LISTPOSITION = CrewDB::getListCrewPosition();
	$LISTASSIGNMENT = CrewDB::getListCrewAssignmentByVessel($id_tug);
	foreach($LISTASSIGNMENT as $crew_assign){
		$crewas[$crew_assign->id_crew_position] = $crew_assign;
	}	
	
	foreach($LISTPOSITION as $position){
		echo '
		<tr>   
		  <td>'.$position->crew_position.'</td>';
		
		if(isset($crewas[$position->id_crew_position])){
			$cr = $crewas[$position->id_crew_position];
			$url = Yii::app()->createUrl("cre/signoff", array('id_tug'=>$id_tug, 'id_crew_position'=>$position->id_crew_position));
			$urledit = Yii::app()->createUrl("cre/signon", array('id_tug'=>$id_tug, 'id_crew_position'=>$position->id_crew_position));
			$cerlevel = isset($cr->crew->certificate_level)? $cr->crew->certificate_level->certiface_level : "-";
			echo '
				<td> READY </td>
				<td>'.$cr->crew->CrewName.'</td>
				<td>'.$cr->crew->StatusOwn.'</td>
				<td>'.$cerlevel.'</td>
				<td>'.Yii::app()->dateFormatter->format("d MMMM y",strtotime($cr->start_date)).'</td>
				<td>'.Yii::app()->dateFormatter->format("d MMMM y",strtotime($cr->expired_date)).'</td>
				<td style="background-color:'.CrewDB::countDurationBackground($cr->start_date,date("Y-m-d")).';">'.CrewDB::countDurationOncrewsign($cr->start_date,date("Y-m-d")).'.</td>
				

			';
		}else{
			$url = Yii::app()->createUrl("cre/signon", array('id_tug'=>$id_tug, 'id_crew_position'=>$position->id_crew_position));
			echo '
				<td> NOT READY </td>
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
?>


<table style="border: 0px solid black;">
 <tr>
  <td width=7% bgcolor="#7AEF46" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> < 4 Months </td>
</tr>

<tr>
  <td width=7% bgcolor="#EA912C" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> 4 - 5 Months</td>
</tr>

<tr>
  <td width=7% bgcolor="#F9443B" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> > 5 Months </td>
</tr>


  </table>


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