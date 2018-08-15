<style>
	h1{
		color: orange;
		font-size : 20px;
	}
	
	h2{
		color: green;
		font-size : 16px;
	}
</style>
<h1>Prerequisite For Sailing<h1>

<?php


    $id = $modelvoyage->id_voyage_order;
    $params1 = $modelvoyage->VesselTug->VesselName;
    
    $criteria=new CDbCriteria;
    $criteria->select='*';  
    $criteria->condition='VesselName=:params';
    $criteria->params=array(':params'=>$params1);
    $data=Vessel::model()->find($criteria);

    //ini untuk id tug
    $id_vessel = $data->id_vessel;
    
    //params2 untuk menampung nama vessel nya sesuai yg di form, 
    //untuk kita gunakan sebagai pembanding dalam query nanti
    $params2 = $modelvoyage->VesselBarge->VesselName;
    // $type = json_encode($params2);

    $criteria2=new CDbCriteria;
    $criteria2->select='*';  
    $data=Vessel::model()->find($criteria2);

    // $vesselType = $data->VesselName;
    $criteria3=new CDbCriteria;
    $criteria3->select='*';  
    $criteria3->condition='VesselName=:params';
    $criteria3->params=array(':params'=>$params2);
    $data=Vessel::model()->find($criteria3);

    //nah, $id_barge ini variable untuk hasil query
    $id_barge = $data->id_vessel;

    // echo $id_barge;
    // var_dump( $vesselType);
    // die();      

    // print_r (serialize($id_vessel));

   // echo "<div class='viko'>".$BARGE->barge."test".$TUG->tug."</div>";
   // die();
?>

<h2>1. Crew Readiness</h2>
<div class="alert alert-info">Crew must be completed for each position. 
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button type="submit" class="btn btn-success"style="float:center_right;">
<a href="http://localhost/fms_dev/cre/readines/Tug/<?php echo $id_vessel; ?>" target="_blank">Check</a>
</button>
</div>


<h2>2. Vessel Document Remainadiness</h2>
<div class="alert alert-info">Document must be completed and valid until now. 
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp
<button type="submit" class="btn btn-success" style="float:center_right;" >
<a href="http://localhost/fms_dev/documentreadines/displaydoc/id_vessel/<?php echo $id_vessel; ?>" target="_blank">Check for Tug</a>
</button>

<button type="submit" class="btn btn-success" style="float:right;">
<a href="http://localhost/fms_dev/documentreadines/displaydoc/id_vessel/<?php echo $id_barge; ?>" target="_blank">Check for Barge</a>
</button>
</div>


<h2>3. Last ROB Information</h2>
<div class="alert alert-info">Last ROB must be done less than 24 hours.
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp 
<button type="submit" class="btn btn-success" style="float:center_right;">
<a href="http://localhost/fms_dev/fuelconsumptiondaily/admin/id_vessel/<?php echo $id_vessel; ?>" target="_blank">Check</a>
</button>
</div>


<?php
		$model=new FuelConsumptionDaily('searchCurrent');
		$model->unsetAttributes();  // clear any default values

		$model->id_vessel = $modelvoyage->BargingVesselTug;
		
		
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'fuel-consumption-daily-grid',
'type' => 'striped bordered condensed',
'summaryText'=>'',
'afterAjaxUpdate' => 'reloaddata', 
'enableHistory'=>true,
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',   
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        //'id_fuel_consumption_daily',
		 array(
			'name'=>'log_date',
			//'value'=>'Yii::app()->dateFormatter->formatDateTime(strtotime($data->log_date), "medium")',
			'value'=>'Timeanddate::getDisplayStandardDatetime($data->log_date)',
			//'value'=>'$data->log_date',
		),
        //'log_date',
        //'id_vessel',
        array(
            'header'=>'Last Fuel Remain',
			'htmlOptions'=>array('style'=>'width:100px; text-align: right;'),
            'value'=>'NumberAndCurrency::formatCurrency($data->last_fuel_remain)',
        ),
		//  'last_fuel_remain',
        'status_remain',
        //'last_longitude',
        
        //'last_latitude',
        array(  
                'header'=>'Position',
                'name'=>'NearestJettyId',
				'type'=>'raw',
                'value'=>
				function($data)  {			
					return "Near ".$data->idJetty->JettyName." ".$data->NearestDistancePoint." nm";
				}
			,
		),
		'pic',
        //'NearestJettyId',
        //'NearestDistancePoint',
        /*'created_date',
        'created_user',
        'ip_user_updated',
        */
		
		/*
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/update",array("id"=>$data->id_fuel_consumption_daily,"id_vessel"=>$data->id_vessel))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/view",array("id"=>$data->id_fuel_consumption_daily))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/delete",array("id"=>$data->id_fuel_consumption_daily))',
                       
                    ),
			),
		),
		*/
),
)); ?> 

