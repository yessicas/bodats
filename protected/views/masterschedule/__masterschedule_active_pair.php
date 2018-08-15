
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	//1. Mendapatkan Pasangan Aktif Set-Type Barge Sekarang
	$LIST_TUG_BARGE = SetTypeDB::getListActiveSetPair();
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_TUG_BARGE as $data){
		$no++;
		
		if(!isset($data->VesselTug)){
			//echo "Tug-Barge Pair not found ( ID ".$data->id_settype_tugbarge.")"; exit();
			$TUG = "UNKNOWN TUG (".$data->tug.")";
			$TUG_STATUS = "";
			$id_vessel_tug = -1;
		}else{
			$TUG = $data->VesselTug->VesselName;
			$TUG_STATUS = $data->VesselTug->Status;
			$id_vessel_tug = $data->VesselTug->id_vessel;
		}
		
		
		if(!isset($data->VesselBarge)){
			//echo "Tug-Barge Pair not found ( ID ".$data->id_settype_tugbarge." )"; exit();
			$id_vessel_barge = -1;
			$BARGE = "UNKNOWN BARGE (".$data->barge.")";
			$BARGE_STATUS = "-";
		}else{
			$id_vessel_barge = $data->VesselBarge->id_vessel;
			$BARGE = $data->VesselBarge->VesselName;
			$BARGE_STATUS = $data->VesselBarge->Status;
		}
		
		
		$TUG_POWER = "";
		if(isset($data->VesselTug->Power))
			$TUG_POWER = $data->VesselTug->Power;
		
		$BARGE_SIZE = "";
		if(isset($data->VesselTug->BargeSize))
			$BARGE_SIZE = $data->VesselTug->BargeSize;
		
		//echo MasterScheduleDisplayer::displayDays($CURRENT_DAY, $MAX_DAY);
		$selmont = $month*1;
		$selyear = $year*1;
		echo MasterScheduleDisplayer::displayDays($selmont, $selyear, $MAX_DAY);
		
		$url_repair_tug = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>0, 'status'=>'REPAIR','month'=>$month,'year'=>$year));
		$url_repair_barge = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>0, 'id_barge'=>$id_vessel_barge, 'status'=>'REPAIR','month'=>$month,'year'=>$year));
		$url_docking = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>$id_vessel_barge, 'status'=>'DOCKING'));
		//$url_voyage_order = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>$id_vessel_barge, 'status'=>'VOYAGE ORDER'));
		$url_voyage_order = Yii::app()->createUrl("voyageorder/shownew_vo_partial", array('id_tug'=>$id_vessel_tug, 'id_barge'=>$id_vessel_barge, 'status'=>'VOYAGE ORDER'));
		$url_offhired = Yii::app()->createUrl("masterschedule/addschedule", array('id_tug'=>$id_vessel_tug, 'id_barge'=>$id_vessel_barge, 'status'=>'OFF HIRED'));
		
		$url_vessel_tug = Yii::app()->createUrl("entity/entivessupdate", array('id'=>$id_vessel_tug));
		$url_vessel_barge = Yii::app()->createUrl("entity/entivessupdate", array('id'=>$id_vessel_barge));

		$url_Voyageplan = Yii::app()->createUrl("voyageOrderPlan/create", array('id_tug'=>$id_vessel_tug, 'id_barge'=>$id_vessel_barge, 'status'=>'VOYAGE PLAN','month'=>$month,'year'=>$year));
		echo  '
			<tr>
				<td style="text-align:left;" rowspan="3">
				<b>'.$no.'. <a href="'.$url_vessel_tug.'">'.$TUG.'</a> - <a href="'.$url_vessel_barge.'">'.$BARGE.'</a> </b>
				<h6 style="margin-top:3px;">'.$TUG_POWER.' HP - '.$BARGE_SIZE.' ft | '.$TUG_STATUS.' - '.$BARGE_STATUS.'</h6>
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
								array('label'=>'Add Voyage Order',
									//'url'=>$url_voyage_order,
									//'linkOptions'=>array('class'=>'various fancybox.ajax'),
									'url'=>$url_voyage_order,
									'linkOptions'=>array('id'=>'pilih_voyage_order'),
									),
									
								array('label'=>'Add Order Plan',
									//'url'=>$url_voyage_order,
									//'linkOptions'=>array('class'=>'various fancybox.ajax'),
									'url'=>$url_Voyageplan,
									'linkOptions'=>array('class'=>'various fancybox.ajax'),
									),
									
								array('label'=>'Add Tug Repair', 
									  'url'=>$url_repair_tug,
									   'linkOptions'=>array('class'=>'various fancybox.ajax')),
								array('label'=>'Add Barge Repair', 
									  'url'=>$url_repair_barge,
									   'linkOptions'=>array('class'=>'various fancybox.ajax')),
								/*
								array('label'=>'Add Docking', 
									'url'=>$url_docking,
									 'linkOptions'=>array('class'=>'various fancybox.ajax')),
								
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
		$listschedule = MasterScheduleDB::getScheduleVessel($STARTDAY,$ENDDAY , $id_vessel_tug);
		$masdata = new MasterScheduleData($MAX_DAY);
		
		/* 
		//Contoh cara menjadwalkan secara manual
		$masdata->addRowData(3, 3);
		$masdata->addRowData(4, 3);
		$masdata->addRowData(5, 3);
		$masdata->addRowData(5, 5);
		$masdata->addRowData(6, 5);
		$masdata->addRowData(5, 107);
		$masdata->addRowData(6, 107);
		
		$masdata->addRowData(10, 20);
		$masdata->addRowData(11, 20);
		$masdata->addRowData(10, 21);
		
		$masdata->addRowData(31, 25);
		$masdata->addRowData(2, 25);
		*/
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
		
		//Tambahkan barge 
		$listschedulebarge = MasterScheduleDB::getScheduleVesselBarge($STARTDAY,$ENDDAY , $id_vessel_barge);
		foreach($listschedulebarge as $sched){
			if(!isset($LIST_SCHEDULE[$sched->id_schedule])){
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
				for($i=$startday;$i<=$endday;$i++){
					$masdata->addRowData($i, $sched->id_schedule);
				}
			}
		}
		
		//Display New Schedule
/*
$list[1] = "";
$list[2] = "";
$list[3] = "";
$list[4] = "D";
$list[5] = "L";
$list[6] = "S";
$list[7] = "S";
$list[8] = "S";
$list[9] = "D";
$list[10] = "D";
$list[11] = "D";
$list[12] = "SB";
$list[13] = "SB";
$list[14] = "SB";
$list[15] = "SB";
$list[16] = "L";
$list[17] = "L";
$list[18] = "L";
$list[19] = "S";
$list[20] = "S";
$list[21] = "S";
$list[22] = "S";
$list[23] = "S";
$list[24] = "S";
$list[25] = "D";
$list[26] = "D";
$list[27] = "D";
$list[28] = "D";
$list[29] = "";
$list[30] = "";
$list[31] = "";
*/
		//$month = $month*1;
		//$year = $year*1;
		
		//Get Plan Schedule From Date
		$LIST_SCHEDULE_PLAN = MasterScheduleDB::getScheduleVesselPlan($STARTDAY, $ENDDAY,$id_vessel_tug );
		$LIST_SCHEDULE_PLAN_DATA = array();
		$curdate="";
		foreach($LIST_SCHEDULE_PLAN as $sched){
			$datefromsql = $sched->schedule_date;
			$time = strtotime($datefromsql);
			//$year = date('Y', $time);
			//$month= date('m', $time);
			$curdate = date('d', $time)*1;
			$LIST_SCHEDULE_PLAN_DATA[$curdate] = $sched->timesheetgroup->voyage_activity_group_short."".$sched->schedule_number;
		}

		

		$RES = '';
		for($i=1;$i<=$MAX_DAY;$i++){	
			if(isset($LIST_SCHEDULE_PLAN_DATA[$i])){
				$datalist = $LIST_SCHEDULE_PLAN_DATA[$i];
			}else{
				$datalist="---";
			}
			$date = Timeanddate::getMySqlDate($i,$month, $year);
			$auth = UsersAccess::stringToArray("ADM, VPC");
			$access = UsersAccess::checkUserAccess($auth);
			if($access){
				$RES .='
				<td width=2%  align="center"><a href="schedulePlan/createsched/vid/'.$id_vessel_tug.'/date/'.$date.'" class="various fancybox.ajax">'.$datalist;
				$RES .= '</a></td>
				';
			}else{
				$RES .='
				<td width=2%  align="center">'.$datalist;
				$RES .= '</td>
				';
			}
		}
		$RES .=' </tr>';
		echo $RES;
		
		//Display New Schedule
/*
$list[1] = "";
$list[2] = "";
$list[3] = "";
$list[4] = "D";
$list[5] = "L";
$list[6] = "S";
$list[7] = "S";
$list[8] = "S";
$list[9] = "D";
$list[10] = "D";
$list[11] = "D";
$list[12] = "SB";
$list[13] = "SB";
$list[14] = "SB";
$list[15] = "";
$list[16] = "L";
$list[17] = "L";
$list[18] = "L";
$list[19] = "S";
$list[20] = "S";
$list[21] = "S";
$list[22] = "S";
$list[23] = "S";
$list[24] = "S";
$list[25] = "D";
$list[26] = "D";
$list[27] = "";
$list[28] = "";
$list[29] = "";
$list[30] = "";
$list[31] = "";
*/

		//Get Plan Actual From Date
		$LIST_SCHEDULE_ACTUAL = MasterScheduleDB::getScheduleVesselActual($STARTDAY, $ENDDAY,$id_vessel_tug );
		$LIST_SCHEDULE_PLAN_ACTUAL = array();
		$curdate="";
		foreach($LIST_SCHEDULE_ACTUAL as $sched){
			$datefromsql = $sched->schedule_date;
			$time = strtotime($datefromsql);
			//$year = date('Y', $time);
			//$month= date('m', $time);
			$curdate = date('d', $time)*1;
			// echo $curdate;
			// die();
			$LIST_SCHEDULE_PLAN_ACTUAL[$curdate] = $sched->timesheetgroup."".$sched->schedule_number;
		}

		$RES = '';
		for($i=1;$i<=$MAX_DAY;$i++){		
			if(isset($LIST_SCHEDULE_PLAN_ACTUAL[$i])){
				$datalist = $LIST_SCHEDULE_PLAN_ACTUAL[$i];
			}else{
				$datalist="-";
			}
			$RES .='
			<td width=2%  align="center"> '.$datalist;
			$RES .= ' </td>
			';
		}
		$RES .=' </tr>';
		echo $RES;
		
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
			</td>
			</tr>
			';
		}
	}
?>
</table>