

<?php


$this->breadcrumbs = array(
    'Timesheets' => array('index'),
    'Manage',
);


if (isset($_GET['inVoyageClose'])) {
    $this->menu = array(
        array('label' => 'Close Voyage Order', 'url' => array('voyageorder/close_voyage')),
        array('label' => 'Timesheet', 'url' => array('timesheet/update_daily', 'id' => $modelvoyage->id_voyage_order, 'inVoyageClose' => 1)),
    );
} else {
    $this->menu = array(
        array('label' => 'Voyage Order On Sailing', 'url' => array('voyageorder/voyage_timesheet')),
        array('label' => 'Daily Update', 'url' => array('timesheet/update_daily', 'id' => $modelvoyage->id_voyage_order)),
//array('label'=>'Create Daily Update','url'=>array('timesheet/create','id'=>$modelvoyage->id_voyage_order)),
    );
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('timesheet-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php if (isset($_GET['inVoyageClose'])) { ?>
    <div id="content">
        <h2>Timesheet  Voyage Number <?php echo $modelvoyage->VoyageNumber ?></h2>
        <hr>
    </div>
<?php } ?>

<?php if (!isset($_GET['inVoyageClose'])) { ?>
    <div id="content">
        <h2>Daily Update Voyage Number <?php echo $modelvoyage->VoyageNumber ?></h2>
        <hr>
    </div>
<?php } ?>

<?php if (Yii::app()->user->hasFlash('success')): ?>

    <div class = "animated flash">
        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;', // false equals no close link
            'alerts' => array(// configurations per alert type
                // success, info, warning, error or danger
                'success' => array('closeText' => '&times;'),
            ),
        ));
        ?>
    </div>

<?php endif; ?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'voyage-close-form-info',
        ));
?>
<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage' => $modelvoyage)); ?>
<?php $this->endWidget(); ?>




<?php
	/*
	//Hitung ulang untuk perhitungan waktunya
	$datas = $model->searchbyvoyage($modelvoyage->id_voyage_order);
	$no = 0;
	$prevdata;
	foreach($datas->getData() as $data){
		$no++;
		echo $no." ";
		echo $data->Category->voyage_activity_desc." ";
		echo $data->StartDate.' == ';
		
		if($no>1){
			$duration = TimeSheetDB::countDurationHours($prevdata->StartDate, $data->StartDate);
			echo $duration;
			$prevdata->Duration = $duration;
			$prevdata->save(false);
		}else{
			//Record Pertama
			$data->Duration = 0;
			$data->save(false);
		}
		echo "<br>";
		
		$prevdata = $data;
	}
	
	$data->Duration = 0;
	$data->save(false);
	*/
?>

<?php
	//Hitung ulang untuk perhitungan waktunya
	//Dihtiung dari nilai yang terakhir saja
	$datas = $model->searchbyvoyage($modelvoyage->id_voyage_order);
	$no = 0;
	$prevdata;
	foreach($datas->getData() as $data){
		$no++;
		//echo $no." ";
		//echo $data->Category->voyage_activity_desc." ";
		//echo $data->StartDate.' == ';
		
		if($no>1){
			$duration = TimeSheetDB::countDurationHours($prevdata->StartDate, $data->StartDate);
			//echo $duration;
			$data->Duration = $duration;
			$data->save(false);
		}else{
			//Record Pertama
			$data->Duration = 0;
			$data->save(false);
		}
		//echo "<br>";
		
		$prevdata = $data;
	}

?>



<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'calculateform',
    'action' => 'timesheetSummary/savedata',
    'method' => 'post',
    'type' => 'horizontal',
        ));
?>

<div class="grid-view" style="font-size:10px;padding-top:0px;">
    <table class="items table table-striped table-bordered table-condensed" style = 'width:450px;'>
        <thead>


            <tr>
				<th  style="vertical-align:middle;text-align:left;width:10%;">No</th>
                <th  style="vertical-align:middle;text-align:left;width:20%;">Day</th>
				<th  style="vertical-align:middle;text-align:left;width:30%;">Date</th>
                <th  style="vertical-align:middle;text-align:center;width:40%;">Activity (Plan)</th>
            </tr>
		</thead>
		<?php
		for($i=1;$i<=9;$i++){
			$day = $i+5;
			$opt = '<select class="span12" name="Timesheet[id_voyage_activity]" id="Timesheet_id_voyage_activity">
<option value="">-- Select --</option>
<option value="10">Arrived at Discharge Port</option>
<option value="9">Arrived at Loading Port</option>
<option value="8">Cast Off</option>
<option value="7">Discharge Process</option>
<option value="17">Docking</option>
<option value="13">Grounded</option>
<option value="2">Loading Process</option>
<option value="20">Repair</option>
<option value="5">Sailing Balast</option>
<option value="4">Sailing Loaded</option>
<option value="11">Stand By Low Water Level</option>
<option value="18">Unutilized</option>
<option value="15">Waiting Bunker</option>
<option value="14">Waiting Clearence</option>
<option value="6">Waiting Discharge</option>
<option value="16">Waiting Docking</option>
<option value="3">Waiting Document</option>
<option value="1">Waiting Loading at Loading Port</option>
<option value="12">Waiting Passing</option>
<option value="19">Waiting Repair</option>
</select>';
		echo '
		<tr>
			<td>'.$i.'.</td>
			<td>Day-'.$day.'</td>
			<td>'.$day.'-02-2018</td>
			<td>
			'.$opt.'
			</td>
		</tr>
		';
		}
		?>
		
	</table>
</div>

<?php $this->endWidget(); ?>







<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.popup_foto',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 400,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => array('type' => 'inside'), // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.various',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 400,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => false, // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
    ),
));
?>


