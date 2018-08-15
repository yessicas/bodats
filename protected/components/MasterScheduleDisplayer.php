<?php
class MasterScheduleDisplayer {
	public static function displayDays($selmont, $selyear, $MAX_DAY, $headTitle = "TUG & BARGE"){
		$CURRENT_DAY = Timeanddate::getCurrentDay();
		$CURRENT_MONTH = Timeanddate::getCurrentMonth();
		$CURRENT_YEAR = Timeanddate::getCurrentYear();
		
		if($selyear > $CURRENT_YEAR){
			//After
			return MasterScheduleDisplayer::displayDaysBeforeAfter($MAX_DAY, 0);
		}else{
			if($selyear == $CURRENT_YEAR){
				
				if($selmont > $CURRENT_MONTH){
					//After
					return MasterScheduleDisplayer::displayDaysBeforeAfter($MAX_DAY, 0);
				}else{
					if($selmont == $CURRENT_MONTH){
						//Right Now
						return MasterScheduleDisplayer::displayDaysOnMonth($CURRENT_DAY, $MAX_DAY, $headTitle);
					}else{
						//Before
						return MasterScheduleDisplayer::displayDaysBeforeAfter($MAX_DAY, 1);
					}
				}
				
			}else{
				//Before
				return MasterScheduleDisplayer::displayDaysBeforeAfter($MAX_DAY, 1);
			}
		}
	}

	public static function displayDaysOnMonth($CURRENT_DAY, $MAX_DAY, $headTitle){
		$RES = '
		<tr>
		<th width=25% align="center" bgcolor="White" style="border: 0px solid white;"> </th>
		';
		
		for($i=1;$i<=$MAX_DAY;$i++){
			$RES .='
			<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> '.$i;
			
			if($i==$CURRENT_DAY){
				$RES .='<i class="icon-circle-arrow-down"></i>';
			}
			
			$RES .=' </th>
			';
		}
		$RES .='
		</tr>
		';
		
		//Display Days
		
		$RES .= '
		<tr>
			<th width=25% align="center" bgcolor="#1A354F"> '.$headTitle.' </th>';
		
		$BGCOLOR_BEFORE = '#000';
		$BGCOLOR_ONDAYS = '#F88028';
		$BGCOLOR_AFTER = '#336699';
		
		for($i=1;$i<=$MAX_DAY;$i++){
			if($i<$CURRENT_DAY){
				$BGCOLOR = $BGCOLOR_BEFORE;
			}else{
				if($i==$CURRENT_DAY){
					$BGCOLOR = $BGCOLOR_ONDAYS;
				}else{
					$BGCOLOR = $BGCOLOR_AFTER;
				}
			}
		
			$RES .='
			<th width=2%  align="center" bgcolor="'.$BGCOLOR.'"> '.$i;
			$RES .=' </th>
			';
		}
		$RES .='
		</tr>
		';
		
		return $RES;
	}
	
	public static function displayDaysBeforeAfter($MAX_DAY, $is_before=1){
		$RES = '
		<tr>
		<th width=25% align="center" bgcolor="White" style="border: 0px solid white;"> </th>
		';
		
		for($i=1;$i<=$MAX_DAY;$i++){
			$RES .='
			<th width=2%  align="center" bgcolor="White" style="border: 0px solid white;"> '.$i;
			$RES .=' </th>
			';
		}
		$RES .='
		</tr>
		';
		
		//Display Days
		
		$RES .= '
		<tr>
			<th width=25% align="center" bgcolor="#1A354F"> TUG & BARGE </th>';
		
		$BGCOLOR_BEFORE = '#000';
		$BGCOLOR_ONDAYS = '#F88028';
		$BGCOLOR_AFTER = '#336699';
		if($is_before==1)
			$BGCOLOR = $BGCOLOR_BEFORE;
		else
			$BGCOLOR = $BGCOLOR_AFTER;
		
		for($i=1;$i<=$MAX_DAY;$i++){		
			$RES .='
			<th width=2%  align="center" bgcolor="'.$BGCOLOR.'"> '.$i;
			$RES .=' </th>
			';
		}
		$RES .='
		</tr>
		';
		
		return $RES;
	}
	
	public static function displayDetailMasterSchedule($this_bef){
		$RES = '
			<tr>
				<td align="left">
				<h4> PATRIA 1 - AURIGA </h4> <br>
				'.
					$this_bef->widget('bootstrap.widgets.TbButtonGroup', array(
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
				'.
				</td>
				
				<td></td>
				<td colspan=20 bgcolor="#94E961"> <h5> OFF HIRE </h5> </td>
				<td colspan=10>
			  </td>
			  </tr>
		';
		
		return $RES;
	}
	
	public static function displayDetailSchedule($LISTDATA, $ROW, $MAX_DAY, $LIST_SCHEDULE, $LIST_VESSEL_STATUS,$viewer){
		$RES = '';
		$number_same = 1;
		$number_empty_same = 1;
		
		for($i=2;$i<=$MAX_DAY;$i++){
			if(isset($LISTDATA[$ROW][$i])){
				if($LISTDATA[$ROW][$i] == $LISTDATA[$ROW][$i-1]){
					$number_same++;
				}else{
					if(isset($LISTDATA[$ROW][$i-1])){
						//$RES .= '<td colspan='.$number_same.'>'.$LISTDATA[$ROW][$i-1].'</td>';
						$id_schedule = $LISTDATA[$ROW][$i-1];
						//$RES .= '<td colspan='.$number_same.' bgcolor="#94E961">'.MasterScheduleDisplayer::displayScheduleInfo($LIST_SCHEDULE, $id_schedule).'</td>';
						$RES .= MasterScheduleDisplayer::displayScheduleInfo($LIST_SCHEDULE, $id_schedule, $number_same, $LIST_VESSEL_STATUS,$viewer);
						$number_same = 1; //Reset
					}else{
						$RES .= '<td colspan='.$number_empty_same.'>-</td>';
						$number_empty_same = 1; //Reset
					}
				}
			}else{
				if(!isset($LISTDATA[$ROW][$i-1])){
					$number_empty_same++;
				}
			}
		}
		
		//Display Sisanya
		if($number_same >= 1){
			//$RES .= '<td colspan='.$number_same.'>'.$LISTDATA[$ROW][$MAX_DAY].'</td>';
			$id_schedule = $LISTDATA[$ROW][$MAX_DAY];
			//$RES .= '<td colspan='.$number_same.'>'.MasterScheduleDisplayer::displayScheduleInfo($LIST_SCHEDULE, $id_schedule).'</td>';
			$RES .= MasterScheduleDisplayer::displayScheduleInfo($LIST_SCHEDULE, $id_schedule, $number_same, $LIST_VESSEL_STATUS,$viewer);
		}
		
		return $RES;
	}
	
	public static function displayScheduleInfo($LIST_SCHEDULE, $id_schedule, $number_same, $LIST_VESSEL_STATUS,$viewer){
		$DISP = "";
		$DISP = $id_schedule;
		
		$bgcolor = "";
		if($id_schedule > 0)
			$content = $id_schedule;
		else
			$content = "";
		
		if(isset($LIST_SCHEDULE[$id_schedule])){
			$schedule = $LIST_SCHEDULE[$id_schedule];
			
			//Definisikan BgColor
			$id_vessel_status = $schedule->id_vessel_status;
			if(isset($LIST_VESSEL_STATUS[$id_vessel_status])){
				$vesstat = $LIST_VESSEL_STATUS[$id_vessel_status];
				$bgcolor = $vesstat->color_scheme;
				
				$STATUS = '<h5>'.$vesstat->vessel_status.'</h5>';
				if($vesstat->vessel_status == "VOYAGE ORDER"){
					$STATUS = nl2br(VoyageOrderDisplayer::displayVoyageInfoShort($id_schedule));
				}
				
				if($vesstat->vessel_status == "VOYAGE PLAN"){
					$STATUS = nl2br(VoyageOrderDisplayer::displayVoyagePlanInfoShort($id_schedule));
				}
				
				if($vesstat->vessel_status == "REPAIR"){
					$STATUS = MasterScheduleDisplayer::displayRepairStatus($schedule);
				}
				
				if($vesstat->vessel_status == "DOCKING"){
					$STATUS = MasterScheduleDisplayer::displayDockingStatus($schedule);
				}
				
				if($viewer){
					$content = ''.$STATUS.' <a href="'.Yii::app()->createUrl("masterschedule/viewdetailOnly/id/".$id_schedule).'" class="various fancybox.ajax"> <h6> [Detail] </h6> </a> ';
				}else{
					$content = ''.$STATUS.' <a href="'.Yii::app()->createUrl("masterschedule/viewdetail/id/".$id_schedule).'" class="various fancybox.ajax"> <h6> [Detail] </h6> </a> ';
				}
				
			}
			
			//Definisikan Display Text
			
		}
		
		$DISP = '<td colspan='.$number_same.' bgcolor="'.$bgcolor.'">'.$content.'</td>';
		
		return $DISP;
		
	}
	
	public static function displayRepairStatus($schedule){
		$icon = "repair.png";
		$VESSEL_NAME = "";
		if($schedule->VesselTugId > 0){
			$VESSEL_NAME = $schedule->vesseltug->VesselName;
		}
		
		if($schedule->VesselBargeId > 0){
			$VESSEL_NAME = $schedule->vesselbarge->VesselName;
		}
		
		$DISP = '<img src="repository/icon/'.$icon.'" width="30px"><h5>REPAIR '.$VESSEL_NAME.'</h5>';
		
		return $DISP;
	}
	
	public static function displayDockingStatus($schedule){
		$icon = "docking.png";
		$VESSEL_NAME = "";
		if($schedule->VesselTugId > 0){
			$VESSEL_NAME = $schedule->vesseltug->VesselName;
		}
		
		if($schedule->VesselBargeId > 0){
			$VESSEL_NAME = $schedule->vesselbarge->VesselName;
		}
		
		$DISP = '<img src="repository/icon/'.$icon.'" width="30px"><h5>DOCKING '.$VESSEL_NAME.'</h5>';
		
		return $DISP;
	}
	
	public static function getStartDay($month, $year, $schedyear, $schedmonth, $scheddate, $MAX_DAY){
		//Check Tahunnya
		if($schedyear < $year){
			return 1;
		}
	
	
		if($month == $schedmonth){
			return $scheddate;
		}else{
			//Jika dimulai dari bulan sebelumnya maka start daynya adalah tanggal 1
			if($schedmonth < $month){
				return 1;
			}
		}
		
		//Jika diluar schedule maka tidak ada startday alias dimulai pada MAX_DAY
		return $MAX_DAY;
	}
	
	public static function getEndDay($month, $year, $schedyear, $schedmonth, $scheddate, $MAX_DAY){
		//Check Tahunnya
		if($schedyear > $year){
			return $MAX_DAY;
		}
	
		if($month == $schedmonth){
			return $scheddate;
		}else{
			//Jika dimulai dari bulan sebelumnya maka start daynya adalah tanggal 1
			if($schedmonth > $month){
				return $MAX_DAY;
			}
		}
		
		return $MAX_DAY;
	}
}

class MasterScheduleData {
	var $LISTDATA= array();
	var $NUM_ROW = 0;
	var $maxday = 0;
	
	public function MasterScheduleData($maxday){
		$this->maxday = $maxday;
		$row = 1;
		$this->LISTDATA[$row] = array();
		$this->NUM_ROW = 1;
	}
	
	public function addRowData($date, $id_schedule, $row=1){
		if(isset($this->LISTDATA[$row][$date])){
			//Rekursif Proses
			$row++;
			$this->addRowData($date, $id_schedule, $row);
			
			if($row > $this->NUM_ROW){
				$this->NUM_ROW = $row;
			}
		}else{
			$this->LISTDATA[$row][$date] = $id_schedule;
		}
	}
	
	public function getListData($row=1){
		//Yang belum diset diisi 0 saja
		for($i=1;$i<=$this->maxday;$i++){
			if(!isset($this->LISTDATA[$row][$i])){
				$this->LISTDATA[$row][$i] = 0;
			}
		}
	
		return $this->LISTDATA;
	}

}

?>