

<?php

 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => 'bandsdialog4',
   'options' => array(
   'autoOpen' => true,
   'title' => 'Select Sales Plan  ',
   'modal' => false,
   'resizable'=>false,
   'width' => '1000',
   'height' => '550',
   'close' => 'js:function(){  $(this).remove(); }',
   ))
 );

?>

<?php /*
echo'
<div id="content">
<h2>Select Sales Plan</h2>
<hr>
</div>';
*/
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'sales-plan-grid',
'type' => 'bordered',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_sales_plan',
		//'id_vessel_tug',
		//'id_vessel_barge',
		//'Customer.CompanyName',
		array(
        'header'=>'No',    'value'=>'$row+1',
            ),
 
		array(  
                'header'=>'Customer',
                'name'=>'id_customer',
                //'name'=>'',
                'value'=>function($data) {
                        return ($data->Customer) ? $data->Customer->CompanyName : "-";
                },
                'filter'=>CHtml::listData(Customer::model()->findAll(array('order'=>'CompanyName ASC')), 'id_customer', 'CompanyName'),
                ),

		//'Tug.VesselName',
		array(  'header'=>'Tug',
                'name'=>'id_vessel_tug',
                'value'=>'$data->Tug->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),
		//'Barge.VesselName',
		array(  'header'=>'Barge',
                'name'=>'id_vessel_barge',
                'value'=>'$data->Barge->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),
		//'LoadingPort.JettyName',
		//'UnloadingPort.JettyName',

		 array(  'header'=>'Port Of Loading',
                'name'=>'JettyIdStart',
                'value'=>'$data->LoadingPort->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'JettyIdEnd',
                'value'=>'$data->UnloadingPort->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),

		'TotalQuantity',
		'voyage_no',
		'year',
		'month',
		
		
		/*
		'id_customer',
		'voyage_no',
		'JettyIdStart',
		'JettyIdEnd',
		'TotalQuantity',
		'QuantityUnit',
		'PriceUnit',
		'id_currency',
		'change_rate',
		'FuelLtr',
		'FuelCost',
		'AgencyCost',
		'DepreciationCost',
		'CrewCost',
		'Rent',
		'SubconCost',
		'IncuranceCost',
		'RepairCost',
		'DockingCost',
		'BrokerageCost',
		'OthersCost',
		'GP_COGM',
		'MarginFuelCost',
		'MarginAgencyCost',
		'MarginDepreciationCost',
		'MarginCrewCost',
		'MarginRent',
		'MarginSubconCost',
		'MarginIncuranceCost',
		'MarginRepairCost',
		'MarginDockingCost',
		'MarginBrokerageCost',
		'MarginOthersCost',
		'GP_COGS',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/

        array(
           'header'=>'',
           'type'=>'raw',
           'value'=>'CHtml::link(CHtml::image(Yii::app()->baseUrl."/css/ceklis.jpg","alt",array("width"=>20,"height"=>20,"title"=>"select")),"",array(
               "onClick"=>CHtml::ajax(array(
               "url"=>Yii::app()->createUrl("salesplan/selectsalesplan",array("id"=>$data->id_sales_plan)),
               "dataType"=>"json",
               "success"=>"function(data){
                     $(\"#id_sales_plan\").val(data.id_sales_plan);
                     $(\"#So_id_sales_plan\").val(data.id_sales_plan);
                     $(\"#CompanyName\").val(data.CompanyName);
                      $(\"#Tug\").val(data.tug);
                       $(\"#Barge\").val(data.barge);
                         $(\"#LoadingPort\").val(data.loadingPort);
                          $(\"#UnloadingPort\").val(data.unloadingPort);
                           $(\"#TotalQuantity\").val(data.totalQuantity);
                            $(\"#voyage_no\").val(data.voyage_no);
                    			
                    		   $(\"#bandsdialog4\").remove(); 
                   			  /*$.fancybox.close();*/
                      
                }")
            ),"id"=>"child".$data->id_sales_plan,"style"=>"cursor:pointer;"))',
         ),

),
));

$this->endWidget('zii.widgets.jui.CJuiDialog');

 ?> 


<?php // button costum close fancy box 
/*
<input type="button" onclick="$.fancybox.close()" value="CloseFB" />
*/

?>


