
<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>
<?php
	//1. Mendapatkan semua data master schedule
	$STARTDAY = Timeanddate::getMySqlDate(1, $month, $year);
	$ENDDAY = Timeanddate::getMySqlDate($MAX_DAY, $month, $year);
	$LIST_TUG_BARGE = MasterScheduleDB::getScheduleVesselOnRange($STARTDAY, $ENDDAY);
	$LIST_SCHEDULE = array();
	$no = 0;
	foreach ($LIST_TUG_BARGE as $data){
		$no++;
		
		
		
		if(!isset($data->vesseltug)){
			//echo "Tug-Barge Pair not found ( ID ".$data->id_settype_tugbarge.")"; exit();
			$TUG = "UNKNOWN TUG (".$data->VesselTugId.")";
			$TUG_STATUS = "";
			$id_vessel_tug = -1;
			$id_vessel_tug = $data->VesselTugId;
		}else{
			$TUG = $data->vesseltug->VesselName;
			$TUG_STATUS = $data->vesseltug->Status;
			$id_vessel_tug = $data->vesseltug->id_vessel;
		}
		
		
		if(!isset($data->vesselbarge)){
			//echo "Tug-Barge Pair not found ( ID ".$data->id_settype_tugbarge." )"; exit();
			$id_vessel_barge = -1;
			$id_vessel_barge = $data->VesselBargeId;
			$BARGE = "UNKNOWN BARGE (".$data->VesselBargeId.")";
			$BARGE_STATUS = "-";
		}else{
			$id_vessel_barge = $data->vesselbarge->id_vessel;
			$BARGE = $data->vesselbarge->VesselName;
			$BARGE_STATUS = $data->vesselbarge->Status;
		}
		
		
		$TUG_POWER = "";
		if(isset($data->vesseltug->Power))
			$TUG_POWER = $data->vesseltug->Power;
		
		$BARGE_SIZE = "";
		if(isset($data->vesseltug->BargeSize))
			$BARGE_SIZE = $data->vesseltug->BargeSize;
		
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
				<td style="text-align:left;">
				<b>'.$no.'. <a href="'.$url_vessel_tug.'">'.$TUG.'</a> - <a href="'.$url_vessel_barge.'">'.$BARGE.'</a> </b>
				<h6 style="margin-top:3px;">'.$TUG_POWER.' HP - '.$BARGE_SIZE.' ft | '.$TUG_STATUS.' - '.$BARGE_STATUS.'</h6>
				<h7>asd</h7>
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
		$listschedulebarge = MasterScheduleDB::getScheduleVesselTugBarge($STARTDAY,$ENDDAY , $id_vessel_barge);
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
		
		//Display Schedule di bagian ini
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