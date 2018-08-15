<style>
.table-striped tbody>tr:nth-child(odd)>td, .table-striped tbody>tr:nth-child(odd)>th {
	background-color: #f9f9f9 !important;
}

.table-condensed th, .table-condensed td {
	padding: 3px 4px;
	font-size: 11px;
	color: #111 !important;
	background: #fff !important;
}

table td, table th {
	padding: 5px 5px 5px 5px;
	text-align: center;
	border: 1px solid #E0E0E0 !important;
	font-size: 11px;
}

#normalhead{
	background-color: #336699;
	color: white;
	font-weight: bold;
}
#exceedhead{
	background-color: red;
	color: white;
	font-weight: bold;
}
#hours{
	background-color: #f7f7f7;

	font-size: 9px;
}

</style>
<?php
	$this->menu=array(
		array('label'=>'Master Schedule','url'=>array('masterschedule/master')),
		array('label'=>'Detail Activity','url'=>array('masterschedule/master'), 'active'=>true),
	);
?>

<h3>View Schedule
<font color=#BD362F> 
Voyage Order
</font>
</h3>

<div class="alert alert-info">
<?php
	echo VoyageOrderDisplayer::displayVoyageInfoShort2($id_voyage_order);
?>
</div>


<?php
	$vo = VoyageOrder::model()->findByPk($id_voyage_order);
	/*
	$scheddate_start = Timeanddate::getDateOnly($vo->StartDate);
	$schedmonth_start = Timeanddate::getMonthOnly($vo->StartDate);
	$schedyear_start = Timeanddate::getYearOnly($vo->StartDate);
	
	$scheddate_end = Timeanddate::getDateOnly($vo->EndDate);
	$schedmonth_end = Timeanddate::getMonthOnly($vo->EndDate);
	$schedyear_end = Timeanddate::getYearOnly($vo->EndDate);
	
	//$MAX_DAY_CURRENT_MONTH = Timeanddate::getMaximumDateEachMonth($schedmonth_start, $schedyear_start);
	*/
	
	$begin = new DateTime( $vo->StartDate);
	$end = new DateTime( $vo->EndDate );
	
	//Contoh data yang lebih
	$currentdate = new DateTime( '2015-01-07' );
	//Contoh data yang kurang

	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);

	$LIST_OF_DAYS = array();
	$LIST_OF_DAYS_STATUS = array();
	$no = 0;
	foreach ( $period as $dt ){
		 //echo $dt->format( "l Y-m-d H:i:s\n" );
		// echo $dt->format( "Y-m-d H:i:s" ).'<br>';
		//echo $dt->format( "Y-m-d" ).'<br>';
		$data = $dt->format( "Y-m-d" );
		$no++;
		$LIST_OF_DAYS[$no] = $data;
		$LIST_OF_DAYS_STATUS[$no] = 'normal';
	}
	
	//Jika jadwal melebihi dari jadwal sekarang
	if($currentdate > $end ){
		$exceddperiod = new DatePeriod($end, $interval, $currentdate);
		foreach ( $exceddperiod as $dt ){
			//echo $dt->format( "Y-m-d" ).'<br>';
			$data = $dt->format( "Y-m-d" );
			$no++;
			$LIST_OF_DAYS[$no] = $data;
			$LIST_OF_DAYS_STATUS[$no] = 'exceed';
		}
	}
?>
<table width="650px">
	<tr>
		<td rowspan="3">PLAN</td>
		<?php
		foreach($LIST_OF_DAYS as $key=>$day){
			$css_display = "";
			$sta = $LIST_OF_DAYS_STATUS[$key];
			if($sta == "normal"){
				$css_display = "normalhead";
			}
			if($sta == "exceed"){
				$css_display = "exceedhead";
			}
			echo '<td colspan="24" id="'.$css_display.'">'.Timeanddate::getDisplayStandardDate($day).'</td>';
		}
		?>
	</tr>
	<tr>
		<?php
		foreach($LIST_OF_DAYS as $day){
			for($i=1;$i<=24;$i++){
				echo '<td id="hours">'.$i.'</td>';
			}
		}
		?>
	</tr>
	<tr>
		<?php
		$datasplan = TimeSheetDB::getTimesheetplan($id_voyage_order);
		foreach($datasplan as $data){
			echo $data->StartDate;
		}
		//Display Value
		foreach($LIST_OF_DAYS as $day){
			for($i=1;$i<=24;$i++){
				echo '<td>-</td>';
			}
		}
		?>
	</tr>
	<tr>
		<td>ACTUAL</td>
	</tr>
</table>