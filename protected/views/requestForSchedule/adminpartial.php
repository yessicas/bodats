
<?php if(isset($_GET['mode'])){

    if($_GET['mode']=='REPAIR'){
        $title='Repair';
        $modelDataProvider=$model->search($_GET['mode']);
    }

    if($_GET['mode']=='DOCKING'){
        $title='Docking';
        $modelDataProvider=$model->search($_GET['mode']);
    }
    
}else{
    $title='Docking';
    $modelDataProvider=$model->search(); 
}
?>


<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => rand(),
   'options' => array(
   'autoOpen' => true,
   'title' => 'Select Request For Schedules '.$title,
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   'close' => 'js:function(){  $(this).remove(); }',
   ))
 );
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'request-for-schedule-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelDataProvider,
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_request_for_schedule',
 array(   
                'header'=>'Vessel',
                'name'=>'id_vessel',
                'value'=>'$data->vessel->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'id_vessel', 'VesselName'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_vessel',
 /*
 array(   
                'header'=>'Vessel Status',
                'name'=>'id_vessel_status',
                'value'=>'$data->vesselstat->vessel_status',
                'filter'=>CHtml::listData(VesselStatus::model()->findAll(),'id_vessel_status', 'vessel_status'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
*/
		//'id_vessel_status',
		//'status_rfs',
  array(
            'name'=>'StartDate',
            'value'=>'Yii::app()->dateFormatter->format("d MMMM y",strtotime($data->StartDate))',
            //'value'=>'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","")',
          //  'filter'=> CHtml::activeTextField($model, 'StartDate', array('id'=>'posting_date_grid')),
            ),
	//	'StartDate',

  array(
            'name'=>'EndDate',
            //'value'=>'Yii::app()->dateFormatter->formatDateTime($data->EndDate, "medium","")',
            'value'=>'Yii::app()->dateFormatter->format("d MMMM y",strtotime($data->EndDate))',
          //  'filter'=> CHtml::activeTextField($model, 'StartDate', array('id'=>'posting_date_grid')),
            ),
    array('name'=>'TypeSchedule','filter'=>array('UNSCHEDULED'=>'UNSCHEDULED', 'SCHEDULED'=>'SCHEDULED')),
    array('name'=>'TypeBreakdown','filter'=>array('UNBREAKDOWN'=>'UNBREAKDOWN', 'BREAKDOWN'=>'BREAKDOWN')),
    'notes',
	//	'EndDate',
		/*
		'notes',
		'id_schedule',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/

     array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'

                    CHtml::link("Approve",
                    array("masterschedule/addschedule","id_request_for_schedule"=>$data->id_request_for_schedule,"id_tug"=>VesselDB::getTugIdVessel($data->id_vessel), "id_barge"=>VesselDB::getBargeIdVessel($data->id_vessel), "StartDate"=>$data->StartDate, "EndDate"=>$data->EndDate, "status"=>isset($_GET["mode"]) ? $_GET["mode"] : "DOCKING"),
                    array("class" => "various fancybox.ajax","style"=>"color:#BD362F")
                    )." | ".
                    CHtml::link("Reject",
                    array("masterschedule/rejectschedule","id_request_for_schedule"=>$data->id_request_for_schedule,"id_tug"=>VesselDB::getTugIdVessel($data->id_vessel), "id_barge"=>VesselDB::getBargeIdVessel($data->id_vessel), "EndDate"=>$data->EndDate, "status"=>isset($_GET["mode"]) ? $_GET["mode"] : "DOCKING"),
                    array("class"=>"reject", "style"=>"color:#BD362F")
                    )

                    ',
         ),

),
)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

?> 

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

$(".reject").click(function(){
    if(confirm("Are you sure you want to Reject this ?")){
        $(".reject").attr(jQuery(this).attr('href'));
    }
    else{
        return false;
    }
});

});

</script>
