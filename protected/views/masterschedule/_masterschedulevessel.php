<?php
	$baseUrl = Yii::app()->baseUrl; 
	$cs = Yii::app()->getClientScript();
	//$cs->registerScriptFile($baseUrl.'/js/yourscript.js');
	$cs->registerCssFile($baseUrl.'/css/pmlmasterschedule.css');
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

 <?php 
	echo '<h3 style="font-family:calibri;">'. "Schedule Per Vessel" .'&nbsp'. '<font color=#BD362F>'. Timeanddate::getFullMonthEng($month).'&nbsp'. $year;
	echo'</font>';
	echo'</h3>';
?> 

	
	<?php 
	if(!$viewer){
		echo '
		<div class="alert alert-block alert-info" style="width:400px; padding:5px; margin: -40px 5px 5px 5px; float:right;">
		Some People has requested to plot schedule. Please check it : <br>
		';
		
		//DOCKING
		$modelDocking=RequestForSchedule::model()->search()->getItemCount();
		$url_docking_partial = Yii::app()->createUrl("requestForSchedule/adminpartial/mode/DOCKING");
		echo'<a id="linktoschedule" class="" href='.$url_docking_partial.'>Request For Schedule Docking ('.$modelDocking.') </a>'; // belum
		echo '<br>';
		
		//REPAIR
		$modelRepair=RequestForSchedule::model()->search('REPAIR')->getItemCount();
		$url_repair_partial = Yii::app()->createUrl("requestForSchedule/adminpartial/mode/REPAIR");
		echo'<a id="linktoschedule" class="" href='.$url_repair_partial.'>Request For Schedule Repair ('.$modelRepair.') </a>'; // belum

		echo '<br>';
		
		// Maintenance
		$modelMaintenance=VesselMaintenancePlan::model()->model()->searchbyStatusNone()->getItemCount();
		$url_maintenance_partial = Yii::app()->createUrl("vesselmaintenanceplan/adminpartial");
		echo'<a id="linktoschedule" class="" href='.$url_maintenance_partial.'>Request For Schedule Maintenance ('.$modelMaintenance.') </a>'; // belum

		echo '<br>';
		//OF Hired
		$modelOffHired=SoOffhiredOrder::model()->search()->getItemCount();
		$url_off_hired_partial = Yii::app()->createUrl("sooffhiredorder/adminpartial");
		// pake fancy box
		//echo'<a class="boxgrid fancybox.ajax" href='.$url_off_hired_partial.'>Request For Schedule Off Hired ('.$modelOffHired.') </a>'; // belum
		echo'<a id="linktoschedule" class="" href='.$url_off_hired_partial.'>Request For Schedule Off Hired ('.$modelOffHired.') </a>'; // belum
		echo '<br>';

		//Vorage Order
		$modelVoyageOrder=VoyageOrder::model()->searchbystatuspropose()->getItemCount();
		$url_voyage_order = Yii::app()->createUrl("voyageorder/showallnew_vo_partial");
		// pake fancy box
		//echo'<a class="boxgrid fancybox.ajax" href='.$url_voyage_order.'>Request For Schedule Voyage Order ('.$modelVoyageOrder.') </a>'; // belum
		echo'<a id="linktoschedule" class="" href='.$url_voyage_order.'>Request For Schedule Voyage Order ('.$modelVoyageOrder.') </a>'; // belum
		echo '<br>';
		
		echo '</div>';
	}
	?>
	<br>
	<br>
	<br>
	<br>

<?php
	$CURRENT_DAY = Timeanddate::getCurrentDay();
	$MAX_DAY = Timeanddate::getMaximumDateEachMonth($month, $year);
	
	//Get Vessel Status
	$LIST_VESSEL_STATUS = array();
	$vesselstatus = VesselStatus::model()->findAll();
	foreach($vesselstatus as $vsta){
		$LIST_VESSEL_STATUS[$vsta->id_vessel_status] = $vsta;
	}
?>

<h1>VESSEL TUG - PAIRED</h1>
<hr>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	$LIST_TUG_PAIR = SetTypeDB::getPairedVesselTug();
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_TUG_PAIR as $data){
		$no++;
		displayRow($no, $data, $month, $year, $MAX_DAY, $viewer, $this, $LIST_SCHEDULE, $LIST_VESSEL_STATUS, "tug");
		
	}
?>
</table>

<h1>VESSEL TUG - UNPAIRED (SINGLE)</h1>
<hr>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	//1. Mendapatkan Pasangan Aktif Set-Type Barge Sekarang
	//$LIST_TUG_BARGE = SetTypeDB::getListActiveSetPair();
	$LIST_TUG = SetTypeDB::getUnpairedVesselTug();
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_TUG as $data){
		/*
		$no++;
		$id_vessel_tug = $data->id_vessel;
		$TUG = $data->VesselName;
		$TUG_STATUS = $data->Status;
		
		$TUG_POWER = "";
		if(isset($data->Power))
			$TUG_POWER = $data->Power;


		
		//echo MasterScheduleDisplayer::displayDays($CURRENT_DAY, $MAX_DAY);
		$selmont = $month*1;
		$selyear = $year*1;
		echo MasterScheduleDisplayer::displayDays($selmont, $selyear, $MAX_DAY);
		
		$url_repair = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>0, 'status'=>'REPAIR'));
		$url_docking = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>0, 'status'=>'DOCKING'));
		$url_offhired = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>0, 'status'=>'OFF HIRED'));
		
		$url_vessel_tug = Yii::app()->createUrl("entity/entivessupdate", array('id'=>$id_vessel_tug));
		echo  '
			<tr>
				<td align="left">
				<h4> '.$no.'. <a href="'.$url_vessel_tug.'">'.$TUG.'</a> </h4>
				<h6>'.$TUG_POWER.' HP ('.$TUG_STATUS.') </h6>
				';
				
				if(!$viewer){
					echo'<br>';
					$this->widget('bootstrap.widgets.TbButtonGroup', array(
						'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
						//'icon'=>'plus white',
						//'size'=>'small',
						'buttons'=>array(
							array('label'=>'ADD', 
								'icon'=>'plus white',
								'items'=>array(	
								array('label'=>'Add Repair', 
									  'url'=>$url_repair,
									   'linkOptions'=>array('class'=>'various fancybox.ajax')),

								array('label'=>'Add Docking', 
									'url'=>$url_docking,
									 'linkOptions'=>array('class'=>'various fancybox.ajax')),
									 
								array('label'=>'Add Off Hired', 
									'url'=>$url_offhired,
									'linkOptions'=>array('class'=>'various fancybox.ajax')
								),
								
							)),
						),
						
						'htmlOptions' => array(
							'style'=>'margin-top:-20px; margin-bottom:5px; text-align:left;',
						),
					)); 
				}
					
		//Get Schedule
		$STARTDAY = Timeanddate::getMySqlDate(1, $month, $year);
		$ENDDAY = Timeanddate::getMySqlDate($MAX_DAY, $month, $year);
		$listschedule = MasterScheduleDB::getScheduleVessel($STARTDAY,$ENDDAY , $id_vessel_tug);
		$masdata = new MasterScheduleData($MAX_DAY);
		
		$startday = 0;
		$endday = 0;
		foreach($listschedule as $sched){
			$LIST_SCHEDULE[$sched->id_schedule] = $sched;
		
			//echo $sched->StartDate.' '.$sched->EndDate.'<br>';
			$schedmonthstart = Timeanddate::getMonthOnly($sched->StartDate);
			$scheddatestart = Timeanddate::getDateOnly($sched->StartDate);
			$schedyearstart = Timeanddate::getYearOnly($sched->StartDate);
			$schedmonthend = Timeanddate::getMonthOnly($sched->EndDate);
			$scheddateend = Timeanddate::getDateOnly($sched->EndDate);
			$schedyearend = Timeanddate::getYearOnly($sched->EndDate);
			$startday = MasterScheduleDisplayer::getStartDay($month, $year, $schedyearstart, $schedmonthstart, $scheddatestart, $MAX_DAY);
			$endday = MasterScheduleDisplayer::getEndDay($month, $year, $schedyearend, $schedmonthend, $scheddateend, $MAX_DAY);
			
			//Masukkan dalam array schedule
			//echo $startday.' '.$endday.'<br>';
			for($i=$startday;$i<=$endday;$i++){
				$masdata->addRowData($i, $sched->id_schedule);
			}
		}
		
		//Display Schedulu di bagian ini
		echo '		
			'.MasterScheduleDisplayer::displayDetailSchedule($masdata->getListData(1), 1, $MAX_DAY, $LIST_SCHEDULE, $LIST_VESSEL_STATUS,$viewer).'
		';
		
		//Display informasi overlap di bagian ini
		$OVERLAPNUMBER = $masdata->NUM_ROW;
		for($row=2;$row <=$OVERLAPNUMBER; $row++){
			$overlapnum = $row-1;
			echo '
			<tr>
			<td>OVERLAP-'.$overlapnum.'</td>
			'.MasterScheduleDisplayer::displayDetailSchedule($masdata->getListData($row), $row, $MAX_DAY, $LIST_SCHEDULE, $LIST_VESSEL_STATUS,$viewer).'
			</tr>
			';
		}
		*/
		$no++;
		displayRow($no, $data, $month, $year, $MAX_DAY, $viewer, $this, $LIST_SCHEDULE, $LIST_VESSEL_STATUS, "tug");
		
	}
?>
</table>

<h1>VESSEL BARGE - PAIRED</h1>
<hr>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	$LIST_BARGE_PAIR = SetTypeDB::getPairedVesselBarge();
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_BARGE_PAIR as $data){
		$no++;
		displayRow($no, $data, $month, $year, $MAX_DAY, $viewer, $this, $LIST_SCHEDULE, $LIST_VESSEL_STATUS, "barge");
		
	}
?>
</table>


<h1>VESSEL BARGE - UNPAIRED (SINGLE)</h1>
<hr>
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	$LIST_BARGE = SetTypeDB::getUnpairedVesselBarge();
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_BARGE as $data){
		$no++;
		displayRow($no, $data, $month, $year, $MAX_DAY, $viewer, $this, $LIST_SCHEDULE, $LIST_VESSEL_STATUS, "barge");
		
	}
?>
</table>


<?php
	function displayRow($no, $data, $month, $year, $MAX_DAY, $viewer, $_this, $LIST_SCHEDULE, $LIST_VESSEL_STATUS, $typevessel){
		
		$id_vessel = $data->id_vessel;
		$TUG = $data->VesselName;
		$TUG_STATUS = $data->Status;
		
		$title = "";
		if($typevessel == "tug"){
			$TUG_POWER = "";
			$title = "TUG";
			if(isset($data->Power))
				$TUG_POWER = $data->Power;
		}
		
		if($typevessel == "barge"){
			$BARGE_CAPACITY = "";
			$title = "BARGE";
			if(isset($data->Capacity))
				$BARGE_CAPACITY = $data->Capacity;
		}
		
		//echo MasterScheduleDisplayer::displayDays($CURRENT_DAY, $MAX_DAY);
		$selmont = $month*1;
		$selyear = $year*1;
		echo MasterScheduleDisplayer::displayDays($selmont, $selyear, $MAX_DAY, $title);
		
		$url_repair ="";
		$url_docking ="";
		$url_offhired ="";
		
		if($typevessel == "tug"){
			$url_repair = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel, 'id_barge'=>0, 'status'=>'REPAIR', 'menu'=>'mastervessel','month'=>$month,'year'=>$year));
			$url_docking = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel, 'id_barge'=>0, 'status'=>'DOCKING', 'menu'=>'mastervessel','month'=>$month,'year'=>$year));
			$url_offhired = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel, 'id_barge'=>0, 'status'=>'OFF HIRED', 'menu'=>'mastervessel','month'=>$month,'year'=>$year));
		}
		
		if($typevessel == "barge"){
			$url_repair = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>0, 'id_barge'=>$id_vessel, 'status'=>'REPAIR','month'=>$month,'year'=>$year));
			$url_docking = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>0, 'id_barge'=>$id_vessel, 'status'=>'DOCKING','month'=>$month,'year'=>$year));
			$url_offhired = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>0, 'id_barge'=>$id_vessel, 'status'=>'OFF HIRED','month'=>$month,'year'=>$year));
		}
		
		$url_vessel_tug = Yii::app()->createUrl("entity/entivessupdate", array('id'=>$id_vessel));
		echo  '
			<tr>
				<td align="left">
				<h4> '.$no.'. <a href="'.$url_vessel_tug.'">'.$TUG.'</a> </h4>
				
				';
				
				if($typevessel == "tug"){
					echo '<h6>'.$TUG_POWER.' HP ('.$TUG_STATUS.') </h6>';
				}
				if($typevessel == "barge"){
					echo '<h6>'.$BARGE_CAPACITY.' MT ('.$TUG_STATUS.') </h6>';
				}
				
				if(!$viewer){
					echo'<br>';
					$_this->widget('bootstrap.widgets.TbButtonGroup', array(
						'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
						//'icon'=>'plus white',
						//'size'=>'small',
						'buttons'=>array(
							array('label'=>'ADD', 
								'icon'=>'plus white',
								'items'=>array(	
								array('label'=>'Add Repair', 
									  'url'=>$url_repair,
									   'linkOptions'=>array('class'=>'various fancybox.ajax')),

								array('label'=>'Add Docking', 
									'url'=>$url_docking,
									 'linkOptions'=>array('class'=>'various fancybox.ajax')),
								/*	 
								array('label'=>'Add Off Hired', 
									'url'=>$url_offhired,
									'linkOptions'=>array('class'=>'various fancybox.ajax')
								),
								*/
								
							)),
						),
						
						'htmlOptions' => array(
							'style'=>'margin-top:-20px; margin-bottom:5px; text-align:left;',
						),
					)); 
				}
					
		//Get Schedule
		$STARTDAY = Timeanddate::getMySqlDate(1, $month, $year);
		$ENDDAY = Timeanddate::getMySqlDate($MAX_DAY, $month, $year);
		if($typevessel == "barge")
			$listschedule = MasterScheduleDB::getScheduleVesselBarge($STARTDAY,$ENDDAY , $id_vessel);
		else
			$listschedule = MasterScheduleDB::getScheduleVessel($STARTDAY,$ENDDAY , $id_vessel);
		
		$masdata = new MasterScheduleData($MAX_DAY);
		
		$startday = 0;
		$endday = 0;
		foreach($listschedule as $sched){
			$LIST_SCHEDULE[$sched->id_schedule] = $sched;
		
			//echo $sched->StartDate.' '.$sched->EndDate.'<br>';
			$schedmonthstart = Timeanddate::getMonthOnly($sched->StartDate);
			$scheddatestart = Timeanddate::getDateOnly($sched->StartDate);
			$schedyearstart = Timeanddate::getYearOnly($sched->StartDate);
			$schedmonthend = Timeanddate::getMonthOnly($sched->EndDate);
			$scheddateend = Timeanddate::getDateOnly($sched->EndDate);
			$schedyearend = Timeanddate::getYearOnly($sched->EndDate);
			$startday = MasterScheduleDisplayer::getStartDay($month, $year, $schedyearstart, $schedmonthstart, $scheddatestart, $MAX_DAY);
			$endday = MasterScheduleDisplayer::getEndDay($month, $year, $schedyearend, $schedmonthend, $scheddateend, $MAX_DAY);
			
			//Masukkan dalam array schedule
			//echo $startday.' '.$endday.'<br>';
			for($i=$startday;$i<=$endday;$i++){
				$masdata->addRowData($i, $sched->id_schedule);
			}
		}
		
		//Display Schedulu di bagian ini
		echo '		
			'.MasterScheduleDisplayer::displayDetailSchedule($masdata->getListData(1), 1, $MAX_DAY, $LIST_SCHEDULE, $LIST_VESSEL_STATUS,$viewer).'
		';
		
		//Display informasi overlap di bagian ini
		$OVERLAPNUMBER = $masdata->NUM_ROW;
		for($row=2;$row <=$OVERLAPNUMBER; $row++){
			$overlapnum = $row-1;
			echo '
			<tr>
			<td>OVERLAP-'.$overlapnum.'</td>
			'.MasterScheduleDisplayer::displayDetailSchedule($masdata->getListData($row), $row, $MAX_DAY, $LIST_SCHEDULE, $LIST_VESSEL_STATUS,$viewer).'
			</tr>
			';
		}
	}
?>
<?php
/*
<tr>
	<th width=25% align="center" bgcolor="White" style="border: 0px solid white;"> </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 1 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 2 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 3 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 4 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 5 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 6 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 7 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 8 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 9 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 10 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> <i class="icon-circle-arrow-down"></i> </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 12 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 13 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 14 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 15 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 16 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 17 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 18 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 19 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 20 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 21 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 22 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 23 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 24 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 25 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 26 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 27 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 28 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 29 </th>
	<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 30 </th>
</tr>

<tr>
	<th width=25% align="center" bgcolor="#1A354F"> TUG & BARGE </th>
	<th width=2%  align="center" bgcolor="#000"> 1 </th>
	<th width=2%  align="center" bgcolor="#000"> 2 </th>
	<th width=2%  align="center" bgcolor="#000"> 3 </th>
	<th width=2%  align="center" bgcolor="#000"> 4 </th>
	<th width=2%  align="center" bgcolor="#000"> 5 </th>
	<th width=2%  align="center" bgcolor="#000"> 6 </th>
	<th width=2%  align="center" bgcolor="#000"> 7 </th>
	<th width=2%  align="center" bgcolor="#000"> 8 </th>
	<th width=2%  align="center" bgcolor="#000"> 9 </th>
	<th width=2%  align="center" bgcolor="#000"> 10 </th>
	<th width=2%  align="center" bgcolor="#F88028"> 11 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 12 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 13 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 14 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 15 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 16 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 17 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 18 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 19 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 20 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 21 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 22 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 23 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 24 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 25 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 26 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 27 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 28 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 29 </th>
	<th width=2%  align="center" bgcolor="#1A354F"> 30 </th>
</tr>

<tr>
	<td align="left">
	<h4> PATRIA 1 - AURIGA </h4> <br>
	<?php 
		$this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			//'icon'=>'plus white',
			//'size'=>'small',
			'buttons'=>array(
				array('label'=>'ADD', 
					'icon'=>'plus white',
					'items'=>array(
					array('label'=>'Add Repair', 
						  'url'=>'masterschedule/repair',
						   'linkOptions'=>array('class'=>'various fancybox.ajax')),

					 array('label'=>'Add Docking', 
						'url'=>'masterschedule/docking',
						 'linkOptions'=>array('class'=>'various fancybox.ajax')),

					array('label'=>'Add Voyage Order', 'url'=>'#'),
					'---',
					array('label'=>'Add Off Hired', 'url'=>'#'),
				)),
			),
			
			'htmlOptions' => array(
				'style'=>'margin-top:-20px; margin-bottom:5px; text-align:left;',
			),
		)); 
	?>
    </td>
	
	<td></td>
	<td colspan=20 bgcolor="#94E961"> <h5> OFF HIRE </h5> </td>
	<td colspan=10>
  </td>
  </tr>
</table>


<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
<th width=25% align="center" bgcolor="White" style="border: 0px solid white;"> </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 1 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 2 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 3 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 4 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 5 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 6 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 7 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 8 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 9 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 10 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 11 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 12 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 13 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 14 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 15 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;">  <i class="icon-circle-arrow-down"></i> </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 17 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 18 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 19 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 20 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 21 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 22 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 23 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 24 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 25 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 26 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 27 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 28 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 29 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 30 </th>

</tr>




<tr>
<th width=25% align="center" bgcolor="#1A354F"> TUG & BARGE </th>
<th width=2%  align="center" bgcolor="#000"> 1 </th>
<th width=2%  align="center" bgcolor="#000"> 2 </th>
<th width=2%  align="center" bgcolor="#000"> 3 </th>
<th width=2%  align="center" bgcolor="#000"> 4 </th>
<th width=2%  align="center" bgcolor="#000"> 5 </th>
<th width=2%  align="center" bgcolor="#000"> 6 </th>
<th width=2%  align="center" bgcolor="#000"> 7 </th>
<th width=2%  align="center" bgcolor="#000"> 8 </th>
<th width=2%  align="center" bgcolor="#000"> 9 </th>
<th width=2%  align="center" bgcolor="#000"> 10 </th>
<th width=2%  align="center" bgcolor="#000"> 11 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 12 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 13 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 14 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 15 </th>
<th width=2%  align="center" bgcolor="#F88028"> 16 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 17 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 18 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 19 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 20 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 21 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 22 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 23 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 24 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 25 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 26 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 27 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 28 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 29 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 30 </th>

</tr>

<tr>
	<td align="left">
<h4> PATRIA 4 - ALYA </h4> <br>

<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        //'icon'=>'plus white',
        //'size'=>'small',
        'buttons'=>array(

            array('label'=>'ADD', 
              'icon'=>'plus white',
              'items'=>array(
                array('label'=>'Add Repair', 
                    'url'=>'masterschedule/repair',
                     'linkOptions'=>array('class'=>'various fancybox.ajax')),

                 array('label'=>'Add Docking', 
                    'url'=>'masterschedule/docking',
                     'linkOptions'=>array('class'=>'various fancybox.ajax')),

                array('label'=>'Add Voyage Order', 'url'=>'#'),
                '---',
                array('label'=>'Add Off Hired', 'url'=>'#'),
            )),
        ),
        
         'htmlOptions' => array(
                  
                          'style'=>'margin-top:-20px; margin-bottom:5px; text-align:left;',
                                     
                          ),
    )); ?>

            </td>



  <td>


  </td>

  <td colspan=6 bgcolor="#F9C89F">

<h5> DOCKING 
 <a href="#" class="various fancybox.ajax"></h5> <h6> [Detail] </h6> </a> 

  </td>

  <td colspan=2 >   </td>

  <td colspan=7 bgcolor="#BAF2F5" style="text-align:left;">

  	<h5> TTA <br>
  	TTB - TBN <br>
  	 56782932 MT </h5>
 </td>

 <td colspan=14>
 </td>

  </tr>

</table>



<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
<th width=25% align="center" bgcolor="White" style="border: 0px solid white;"> </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 1 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 2 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 3 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 4 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 5 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 6 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> <i class="icon-circle-arrow-down"></i> </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 8 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 9 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 10 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 11 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 12 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 13 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 14 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 15 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 16 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 17 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 18 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 19 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 20 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 21 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 22 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 23 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 24 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 25 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 26 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 27 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 28 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 29 </th>
<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> 30 </th>

</tr>


<tr>
<th width=25% align="center" bgcolor="#1A354F"> TUG & BARGE </th>
<th width=2%  align="center" bgcolor="#1A354F"> 1 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 2 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 3 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 4 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 5 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 6 </th>
<th width=2%  align="center" bgcolor="#F88028"> 7 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 8 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 9 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 10 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 11 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 12 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 13 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 14 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 15 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 16 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 17 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 18 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 19 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 20 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 21 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 22 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 23 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 24 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 25 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 26 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 27 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 28 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 29 </th>
<th width=2%  align="center" bgcolor="#1A354F"> 30 </th>

</tr>

<tr>
	<td align="left">
<h4> PATRIA 2 - AURA </h4> <br>

<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        //'icon'=>'plus white',
        //'size'=>'small',
        'buttons'=>array(

            array('label'=>'ADD', 
              'icon'=>'plus white',
              'items'=>array(
                array('label'=>'Add Repair', 
                    'url'=>'masterschedule/repair',
                     'linkOptions'=>array('class'=>'various fancybox.ajax')),

                 array('label'=>'Add Docking', 
                    'url'=>'masterschedule/docking',
                     'linkOptions'=>array('class'=>'various fancybox.ajax')),

                array('label'=>'Add Voyage Order', 'url'=>'#'),
                '---',
                array('label'=>'Add Off Hired', 'url'=>'#'),
            )),
        ),
        
         'htmlOptions' => array(
                  
                          'style'=>'margin-top:-20px; margin-bottom:5px; text-align:left;',
                                     
                          ),
    )); ?>

            </td>



  <td>


  </td>

  <td colspan=6 bgcolor="#F88028">

<h5> REPAIR AE 
 <a href="" class="various fancybox.ajax"></h5> <h6> [Detail] </h6> </a> 

  </td>

  <td colspan=2 >   </td>

  <td colspan=7 bgcolor="#BAF2F5" style="text-align:left;">

  	<h5> TTA  <a href="#" class="various fancybox.ajax" style="font-size:12px;">  [Detail]   </a>  <br>
  	TTB - TBN <br>
  	 56782932 MT </h5>
 </td>

 <td colspan=14>
 </td>

  </tr>

</table>

*/
?>



<div id="namafield" style="visibility: hidden;"></div>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

jQuery('body').on('click','#pilih_voyage_order',function(){jQuery.ajax({'url':jQuery(this).attr('href'),'cache':false,'success':function(html){jQuery("#namafield").html(html)}});return false;});

jQuery('body').on('click','#linktoschedule',function(){jQuery.ajax({'url':jQuery(this).attr('href'),'cache':false,'success':function(html){jQuery("#namafield").html(html)}});return false;});

// pake fancy box
//$('.boxgrid').fancybox({'maxWidth':900,'maxHeight':600,'fitToView':false,'width':850,'height':'auto','autoSize':false,'closeClick':false,'closeBtn':true,'helpers':{'title':false,'overlay':{'closeClick':false}},'openEffect':'elastic','closeEffect':'elastic'});

});
/*]]>*/
</script>
