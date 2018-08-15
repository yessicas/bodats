
<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => rand(),
   'options' => array(
   'autoOpen' => true,
   'title' => 'Select Voyage Order ',
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   'close' => 'js:function(){  $(this).remove(); }',
   ))
 );
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchbystatusproposebyvessel($id_tug,$id_barge),
//'dataProvider'=>$model->searchbystatuspropose(),
'filter'=>$model,
'columns'=>array(
		//'id_voyage_order',
		//'VoyageNumber',
		//'VoyageOrderNumber',
		//'VONo',
		//'VOMonth',
		//'VOYear',
		
		//'id_quotation',
		//'id_so',
		//'id_voyage_order_plan',
		//'status',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'bussiness_type_order',
         array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		//'BargingVesselTug',
		//'BargingVesselBarge',

        array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                'value'=>'$data->VesselTug->VesselName',
                'filter'=>false,
                'htmlOptions'=>array('width'=>'120px'),
                /*
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                */        

             ),

         array(  'header'=>'Barge',
                'name'=>'BargingVesselBarge',
                'value'=>'$data->VesselBarge->VesselName',
                'filter'=>false,
                'htmlOptions'=>array('width'=>'120px'),
                /*
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                */                    

             ),

        //'IdNodeDestination',
    

        array(  'header'=>'Port Of Loading',
                'name'=>'BargingJettyIdStart',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'BargeSize',
		'Capacity',
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
        /*
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/

        array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'CHtml::link("Approve",
					array("voyageorder/create_vo","id"=>$data->id_voyage_order,"status"=>"schedule"),
					array("class" => "various fancybox.ajax", "style"=>"color:#BD362F")
					)." | ".
          CHtml::link("Reject",
          array("voyageorder/reject_vo","id"=>$data->id_voyage_order),
           array("class"=>"reject", "style"=>"color:#BD362F")
          )',
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