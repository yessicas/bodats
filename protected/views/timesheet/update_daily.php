

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


<?php if (isset($_GET['inVoyageClose']) && !isset($_GET['inView'])) { ?>
    <div class="tambah">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('strings', 'Add TimeSheet'),
            'icon' => 'plus white',
            'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            //'url'=>array('create'),   
            'url' => array('timesheet/create', 'id' => $modelvoyage->id_voyage_order, 'inVoyageClose' => 1),
            'htmlOptions' => array(
            //'class'=>'various fancybox.ajax',
            ),
        ));
        ?> 
    </div>
<?php } ?>


<?php if (!isset($_GET['inVoyageClose'])) { ?>
    <div class="tambah">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('strings', 'Add Daily Update'),
            'icon' => 'plus white',
            'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            //'url'=>array('create'),   
            'url' => array('timesheet/create', 'id' => $modelvoyage->id_voyage_order),
            'htmlOptions' => array(
            //'class'=>'various fancybox.ajax',
            ),
        ));
        ?> 
    </div>
<?php } ?>

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
	//1. Hitung ulang untuk perhitungan waktunya (Durasinya)
	//Dihtiung dari nilai yang terakhir saja
	
	$datas = $model->searchbyvoyage($modelvoyage->id_voyage_order);
	$no = 0;
	$prevdata;
	
	//2. Tambahkan mekanisme untuk mapping ke schedule categorynya
	$LIST_CATEGORY_SCHEDULE = array();
	
	foreach($datas->getData() as $data){
		$no++;
		//echo $no." ";
		//echo $data->Category->voyage_activity_desc." ";
		if($no>1){
			$prevdate = Timeanddate::getFullDateOnly($prevdata->StartDate);
		}else{
			$prevdate = "0000-00-00";
		}
		$curdate = Timeanddate::getFullDateOnly($data->StartDate);
		
		if($prevdate == $curdate){
			$durationFromStartDay = TimeSheetDB::countDurationHours($prevdata->StartDate, $data->StartDate);
		}else{
			$durationFromStartDay = TimeSheetDB::countDurationHours($curdate, $data->StartDate);
		}
		//echo Timeanddate::getFullDateOnly($data->StartDate).' '.$durationFromStartDay.'== <Br>';
		

		
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
		
		if(!isset($LIST_CATEGORY_SCHEDULE[$curdate])){
			$LIST_CATEGORY_SCHEDULE[$curdate] = $data;
		}else{
			$prevlist = $LIST_CATEGORY_SCHEDULE[$curdate];
			if($prevlist->Duration < $data->Duration){
				$LIST_CATEGORY_SCHEDULE[$curdate] = $data;
			}
		}
		
		$prevdata = $data;
	}
	
	foreach($LIST_CATEGORY_SCHEDULE as $key=>$sched){
		//echo $key." ".$sched->Category->voyage_activity_desc." <br>";
		$schedac = ScheduleActual::model()->findByAttributes(array(
			"VesselTugId"=>$modelvoyage->BargingVesselTug,
			"schedule_date"=>$key,
		));
		if($schedac == null){
			$schedac = new ScheduleActual();
		}
		if(isset($sched->Category)){
			$schedac->VesselTugId = $modelvoyage->BargingVesselTug;
			$schedac->schedule_number = $modelvoyage->VoyageNumber;
			$schedac->schedule_date = $key;
			$schedac->id_voyage_activity_group = $sched->Category->id_voyage_activity_group;
			
			$schedac->sch_month = Timeanddate::getMonthOnly($key);
			$schedac->sch_year =  Timeanddate::getYearOnly($key);
			
			$schedac = LogRegister::setUserCreated($schedac);
			
			$schedac->save(false);
		}
	}

?>

<?php


$this->widget('bootstrap.widgets.TbGridView', array(
    
    'id' => 'timesheet-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->searchbyvoyage($modelvoyage->id_voyage_order),
    'enableSorting' => false,
    'summaryText' => '',
    'columns' => array(
        //'id_timesheet',
        //'id_voyage_order',
        array(
            'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('style' => 'text-align:center')),
        array(
            'header' => 'Date',
            'name' => 'StartDate',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","short")',
        ),
		array('name' => 'Activity',
        // 'footer'=>'Total Duration ',
        // 'footerHtmlOptions'=>array(
        //     'style'=>'text-align:left;font-weight:bold;'
        // ),
        ),
		'Duration',  
        // 'StartDate',
        //'id_voyage_activity',
		/*
        array('header' => 'Category',
            'name' => 'id_voyage_activity',
            'value' => '$data->Category->voyage_activity_desc',
            //'filter' => CHtml::listData(VoyageMstActivity::model()->findAll(), 'id_voyage_activity', 'voyage_activity_desc'),
        ),
		*/
		array(
			'header' => 'Category',
            'name' => 'id_voyage_activity',
			'value' => function($data) {
				if(isset($data->Category)){
					return $data->Category->voyage_activity_desc;
				}else{
					return "UNKNOWN (".$data->id_voyage_activity.")";
				}
            },
        ),
        'timesheet_desc',
		array(
			'header' => 'Resume Category',
            'name' => 'id_mst_timesheet_summary',
            //'value' => '$data->MstTimesheetSummary->timesheet_summary',
			'value' => function($data) {
				if(isset($data->MstTimesheetSummary)){
					return $data->MstTimesheetSummary->timesheet_summary;
				}else{
					return "UNKNOWN (".$data->id_mst_timesheet_summary.")";
				}
            },
        ),
        array('header' => 'Position',
            'name' => 'JettyId',
            'value' => function($data) {

                return ($data->JettyId == "0") ? "BANJARMASIN" : $data->Position->JettyName;
            },
            //'value'=>'$data->Position->JettyName',
            'filter' => CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
        ),
        //  'PortCategory',
       
             
                    
//                    array(
//                        'name'=> 'Duration',
//                        'output'=> 'Yii::app()->'
//                    ),
//                    array(
//                        'header' => 'Timesheet',
//                        'name'=> 'Duration',
//                        'value' => function($command,$data) {
//                            
//                           
//static $id;
//$id = -1;
//$id++;
//$o = (object)$command[$id];
//$a = (array)$o;
//
//echo $a['duration']; 
//                            
//                return '1';
//            },
//                    ),
                      
        
//          array(
//          'class'=>'ext.gridcolumns.TotalColumn',
//          'name'=>'Duration',
//          'htmlOptions'=>array('style'=>'text-align:right'),
//          'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"")',
//          'type'=>'raw',
//          'footer'=>true,
//          'footerHtmlOptions'=>array(
//          'style'=>'text-align: right; padding-right: 5px;font-weight:bold;',
//          ),
//          ),
        
        'Remarks',
        /*
          'updated_date',
          'updated_user',
          'ip_user_updated',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'visible' => !isset($_GET['inView']),
            'template' => '{update}{update_timesheet}{insert}{insert_timesheet}{delete}',
            'buttons' => array(
                'update_timesheet' =>
                array(
                    'url' => 'Yii::app()->createUrl("timesheet/update",array("id"=>$data->id_timesheet,"inVoyageClose"=>1))',
                    'icon' => 'pencil',
                    'visible' => 'isset($_GET["inVoyageClose"])',
                ),
                'update' =>
                array(
                    'url' => 'Yii::app()->createUrl("timesheet/update",array("id"=>$data->id_timesheet))',
                    'visible' => '!isset($_GET["inVoyageClose"])',
                //'icon'=>'share',
                ),
                'insert' =>
                array(
                    'url' => 'Yii::app()->createUrl("timesheet/insert",array("id"=>$data->id_voyage_order,"StartDate"=>$data->StartDate))',
                    'icon' => 'share',
                    'visible' => '!isset($_GET["inVoyageClose"])',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'Insert',
                    ),
                ),
                'insert_timesheet' =>
                array(
                    'url' => 'Yii::app()->createUrl("timesheet/insert",array("id"=>$data->id_voyage_order,"StartDate"=>$data->StartDate,"inVoyageClose"=>1))',
                    'icon' => 'share',
                    'visible' => 'isset($_GET["inVoyageClose"])',
                    'options' => array(
                        'class' => '',
                        'rel' => '',
                        'title' => 'Insert',
                    ),
                ),
                'delete' =>
                array(
                    'url' => 'Yii::app()->createUrl("timesheet/delete",array("id"=>$data->id_timesheet,"id_voyage_order"=>$data->id_voyage_order))',
                //'icon'=>'share',
                ),
            ),
        ),
    ),
));
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
    <table class="items table table-striped table-bordered table-condensed" style = 'width:250px;'>
        <thead>


            <tr>
                <th  style="vertical-align:middle;text-align:left;width:70%;">Resume</th>
                <th  style="vertical-align:middle;text-align:center;width:30%;">Hours</th>
            </tr>




            <?php
            /*
              $mstTimesheetSummary= MstTimesheetSummary::model()->findAllByAttributes(array('is_active'=>1));

              foreach ($mstTimesheetSummary as $list_mstTimesheetSummary ) {
              $createData =CHtml::link("Add ", Yii::app()->controller->createUrl("timesheetSummary/adddata",
              array("id_voyage_order"=>$modelvoyage->id_voyage_order,"id_mst_timesheet_summary"=>$list_mstTimesheetSummary->id_mst_timesheet_summary,'inVoyageClose'=>$_GET['inVoyageClose'])), array("class"=>"various fancybox.ajax","title"=>"Add"));
              $updateData =CHtml::link("Edit ", Yii::app()->controller->createUrl("timesheetSummary/editdata",
              array("id_voyage_order"=>$modelvoyage->id_voyage_order,"id_mst_timesheet_summary"=>$list_mstTimesheetSummary->id_mst_timesheet_summary,'inVoyageClose'=>$_GET['inVoyageClose'])), array("class"=>"various fancybox.ajax","title"=>"Edit"));

              $status=getStatusSummary($modelvoyage->id_voyage_order, $list_mstTimesheetSummary->id_mst_timesheet_summary);
              $value=getDataSummary($modelvoyage->id_voyage_order, $list_mstTimesheetSummary->id_mst_timesheet_summary);

              if($status){
              $url=$updateData;
              }else{
              $url=$createData;
              }

              echo '<tr class="even">
              <td style="vertical-align:middle;text-align:left;">'.$list_mstTimesheetSummary->timesheet_summary.'</td>
              <td style="vertical-align:middle;text-align:right;">'.$value.'</td>
              <td style="vertical-align:middle;text-align:right;">'.$url.'</td>
              </tr>';
              }



              function getStatusSummary($id_voyage_order,$id_mst_timesheet_summary){

              $TimesheetSummary= TimesheetSummary::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'id_mst_timesheet_summary'=>$id_mst_timesheet_summary));
              if($TimesheetSummary){
              return true;
              }else{
              return false;
              }

              }

              function getDataSummary($id_voyage_order,$id_mst_timesheet_summary){

              $atatus=getStatusSummary($id_voyage_order,$id_mst_timesheet_summary);

              if($atatus){
              return $TimesheetSummary= TimesheetSummary::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'id_mst_timesheet_summary'=>$id_mst_timesheet_summary))->value;
              }else{
              return '-';
              }

              }

             */
            ?>




            <?php
            $mstTimesheetSummary = MstTimesheetSummary::model()->findAllByAttributes(array('is_active' => 1));

            echo CHtml::hiddenField('id_voyage_order', $modelvoyage->id_voyage_order, array('class' => 'span5', 'maxLength' => 10));



            foreach ($mstTimesheetSummary as $list_mstTimesheetSummary) {
                $value = getTotalTimesheetSummary($modelvoyage->id_voyage_order, $list_mstTimesheetSummary->id_mst_timesheet_summary);
                $form = CHtml::textField('timesheetsummary' . $list_mstTimesheetSummary->id_mst_timesheet_summary, $value, array('class' => 'span10', 'maxLength' => 10));
                echo '<tr class="even">
    <td style="vertical-align:middle;text-align:left;">' . $list_mstTimesheetSummary->timesheet_summary . '</td>
    <td style="vertical-align:middle;text-align:center">' . $form . '</td>
    </tr>';
            }

            function getStatusSummary($id_voyage_order, $id_mst_timesheet_summary) {

                $TimesheetSummary = TimesheetSummary::model()->findByAttributes(array('id_voyage_order' => $id_voyage_order, 'id_mst_timesheet_summary' => $id_mst_timesheet_summary));
                if ($TimesheetSummary) {
                    return true;
                } else {
                    return false;
                }
            }

            function getDataSummary($id_voyage_order, $id_mst_timesheet_summary) {

                $atatus = getStatusSummary($id_voyage_order, $id_mst_timesheet_summary);

                if ($atatus) {
                    return $TimesheetSummary = TimesheetSummary::model()->findByAttributes(array('id_voyage_order' => $id_voyage_order, 'id_mst_timesheet_summary' => $id_mst_timesheet_summary))->value;
                } else {
                    return '0';
                }
            }

            function getTotalTimesheetSummary($id_voyage_order, $id_mst_timesheet_summary) {

                $tss = Timesheet::model()->findAllByAttributes(array('id_voyage_order' => $id_voyage_order, 'id_mst_timesheet_summary' => $id_mst_timesheet_summary));
                $total = 0;
                foreach ($tss as $ts) {
                    $total = $total + $ts->Duration;
                }
                return $total;
            }
            ?>

            <?php /*
              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Sailing On Ballast Conditions </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Sailing On Loaded Conditions </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Waiting at  Loading Port </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Waiting at Trisakti Ballast</td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Waiting at Discharging Port </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Loading Time </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Discharging Time </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Loading Rate </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>

              <tr class="even">
              <td style="vertical-align:middle;text-align:left;"> Discharging Rate </td>
              <td style="vertical-align:middle;text-align:right;"> xx </td>
              </tr>
             */ ?>

            <tr class="even">
                <td style="vertical-align:middle;text-align:left;">  </td>
                <td style="vertical-align:middle;text-align:center;">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => 'Save',
                    ));
                    ?>
                </td>
            </tr>

            </tbody>
    </table>
</div>

<?php $this->endWidget(); ?>





<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => Yii::t('strings', 'Print'),
    'icon' => 'print white',
    'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    //'url'=>array('create'), 
    //'size'=>'small',  
    'url' => array('timesheet/report', 'id' => $modelvoyage->id_voyage_order),
    'htmlOptions' => array(
        'target' => '_blank',
    ),
));

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => Yii::t('strings', 'View'),
    'icon' => 'eye-open white',
    'type' => 'warning', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    //'url'=>array('create'), 
    //'size'=>'small',  
    'url' => array('timesheet/viewreport', 'id' => $modelvoyage->id_voyage_order),
    'htmlOptions' => array(
        'target' => '_blank',
    ),
));
?>

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


