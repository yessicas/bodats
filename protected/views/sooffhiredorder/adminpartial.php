
<?php 
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => rand(),
   'options' => array(
   'autoOpen' => true,
   'title' => 'Select Request For Schedules Off Hired',
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   'close' => 'js:function(){  $(this).remove(); }',
   ))
 );

 
?>
<?php /* // pake fancy box 
<div id="content">
<h2>Select Request For Schedules Off Hired</h2>
<hr>
</div>
*/ ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'so-offhired-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_so_offhired_order',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         'OffhiredOrderNumber',
          array(
            'name'=>'SODate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->SODate, "medium","")',
            ),
        // 'SODate',
		//'id_quotation',
		//'id_customer',
		//'VesselTug',
		//'VesselBarge',
         array(  'header'=>'Tug',
                'name'=>'VesselTug',
                'value'=>'$data->VesselTugs->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'VesselBarge',
                'value'=>'$data->VesselBarges->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),

    
          array(
            'name'=>'TCStartDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->TCStartDate, "medium","")',
            ),
    
       // 'TCStartDate',
           array(
            'name'=>'TCEndDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->TCEndDate, "medium","")',
            ),
      //  'TCEndDate',
        'TCPrice',
		/*
		'SONo',
		'SOMonth',
		'SOYear',
		'SODate',
		'period_year',
		'period_month',
		'period_quartal',
		'TCStartDate',
		'TCEndDate',
		'TCPrice',
		'SOQuartal',
		'Marks',
		*/


         array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'

                    CHtml::link("Approve",
                    array("masterschedule/addschedule","id_so_offhired_order"=>$data->id_so_offhired_order,"id_tug"=>$data->VesselTug, "id_barge"=>$data->VesselBarge, "StartDate"=>$data->TCStartDate, "EndDate"=>$data->TCEndDate, "status"=>"OFF HIRED"),
                    array("class" => "various fancybox.ajax","style"=>"color:#BD362F")
                    )." | ".
                    CHtml::link("Reject",
                    array("masterschedule/rejectscheduleoffhired","id_so_offhired_order"=>$data->id_so_offhired_order,"id_tug"=>$data->VesselTug, "id_barge"=>$data->VesselBarge, "StartDate"=>$data->TCStartDate, "EndDate"=>$data->TCEndDate, "status"=>"OFF HIRED"),
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

