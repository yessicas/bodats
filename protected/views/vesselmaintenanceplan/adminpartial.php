

<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => rand(),
   'options' => array(
   'autoOpen' => true,
   'title' => 'Vessel Maintenance Plan',
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   'close' => 'js:function(){  $(this).remove(); }',
   ))
 );
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vessel-maintenance-plan-grid',
'dataProvider'=>$model->searchbyStatusNone(),
'type' => 'striped bordered condensed',
//'summaryText'=>'',
//'enableSorting' => false,
//'htmlOptions'=>array('style'=>'font-size:12px;'),
//'afterAjaxUpdate' => 'reinstallDatePicker', 
'filter'=>$model,
'columns'=>array(
		
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
        /*
		array(
            'header'=>'',
			'name'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::image(Yii::app()->baseUrl."/images/".$data->atribute,"alt",array("width"=>100,"height"=>100))',
			'value'=>'CHtml::link($data->atribute, Yii::app()->controller->createUrl("controler/action",
                                                array("id"=>$data->atribute )))',
            'htmlOptions'=>array('width'=>'100px')
			'filter'=>CHtml::listData(MyModel::model()->findAll(),'value', 'view value'),
			'filter'=>array('array1'=>'array1'),
        ),
		
		array('header'=>'','type'=>'raw',
			'value'=>function($data) {
			return ($data->atribute == "0") ? "text" : $data->atribut." "."text";
			},
			),
		// untuk combo box ajax di grid 
		 array('header'=>'Status','name'=>'status',
        'filter'=>array('REGISTER'=>'REGISTER', 'OPEN'=>'OPEN','BANNED'=>'BANNED','CLOSED'=>'CLOSED'),
        'type'=>'raw',
        'value'=>'CHtml::dropDownlist("status".$data->id_forum_topic,"",  array("REGISTER"=>"REGISTER", "OPEN"=>"OPEN","BANNED"=>"BANNED","CLOSED"=>"CLOSED"),array("style"=>"width:120px", "options" => array($data->status=>array("selected"=>true)),
        "id" => "status".$data->id_forum_topic, "ajax" => array("type"=>"POST", "url"=>Yii::app()->request->baseUrl."/forumtopic/update_status/id_forum_topic/".$data->id_forum_topic, "success"=>"allFine")))',
          ),
		 
		  array(
            'name' => 'attribute',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'attribute', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		
		array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'header' => 'Hak akses',
		'value' => 'CHtml::encode($data->ubahAkses())',
		'filter'=>array('1'=>'1', '2'=>'2'),
		),
		*/
       // 'id_vessel',
        array(   
                'header'=>'Vessel Name',
                'name'=>'VesselName',
                'value'=>'$data->Vessel->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'VesselName', 'VesselName'),
                ),
        'MaintenanceName',
		//'id_vessel_maintenance_plan',
        /*array(   
                'header'=>'Maintenance Type',
                'name'=>'id_maintenance_type',
                'value'=>'$data->MstMaintenanceType->MaintenanceTypeName',
                //'filter'=>CHtml::listData(Vessel::model()->findAll(),'VesselName', 'VesselName'),
                ),
		//'id_maintenance_type',
        */
 array(
            'name' => 'start_date',
             'value'=>'Yii::app()->dateFormatter->formatDateTime($data->start_date, "medium","")',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'start_date', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_start_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		//'start_date',
array(
            'name' => 'end_date',
             'value'=>'Yii::app()->dateFormatter->formatDateTime($data->end_date, "medium","")',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'end_date', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_end_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
	//	'end_date',
         array(   
                'header'=>'Duration (days)',
                'name'=>'Duration',
		//'Duration',
                ),
		'Description',
        /*
		'RunningHour',
		
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
        array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'

                    CHtml::link("Approve",
                    array("masterschedule/addschedule","id_vessel_maintenance_plan"=>$data->id_vessel_maintenance_plan,"id_tug"=>VesselDB::getTugIdVessel($data->id_vessel), "id_barge"=>VesselDB::getBargeIdVessel($data->id_vessel), "StartDate"=>$data->start_date, "EndDate"=>$data->end_date, "status"=>"MAINTENANCE"),
                    array("class" => "various fancybox.ajax","style"=>"color:#BD362F")
                    )." | ".
                    CHtml::link("Reject",
                    array("masterschedule/rejectscheduleplan","id_vessel_maintenance_plan"=>$data->id_vessel_maintenance_plan,"id_tug"=>VesselDB::getTugIdVessel($data->id_vessel), "id_barge"=>VesselDB::getBargeIdVessel($data->id_vessel), "EndDate"=>$data->end_date, "status"=>"MAINTENANCE"),
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


/*
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
*/

?>

